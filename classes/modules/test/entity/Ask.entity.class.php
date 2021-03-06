<?php

class PluginTest_ModuleTest_EntityAsk extends EntityORM
{

    protected $aValidateRules = array(
        array('title', 'string', 'max' => 50, 'min' => 1, 'allowEmpty' => true),
        array('text', 'string', 'max' => 1000, 'min' => 1, 'allowEmpty' => false),
        array('hint', 'string', 'max' => 2000, 'min' => 1, 'allowEmpty' => true),
        array('hint_source', 'string', 'max' => 2000, 'min' => 1, 'allowEmpty' => true),
    );
    
    protected $aBehaviors = array(
        // Категории
        'category' => array(
            'class'       => 'ModuleCategory_BehaviorEntity',
            'target_type' => 'test',
            'form_field'  => 'category',
        ),
        'image' => [
            'PluginMedia_ModuleMedia_BehaviorEntity',
            'target_type' => 'image_ask',
            'field_name'  => 'image',
            'field_label' => 'Изображение:'
        ]
    );
   
    protected $aRelations = array(
        'test' => array( self::RELATION_TYPE_BELONGS_TO, 'PluginTest_ModuleTest_EntityTest', 'test_id' ),
        'bilet' => array( self::RELATION_TYPE_BELONGS_TO, 'PluginTest_ModuleTest_EntityBilet', 'bilet_id' ),
        'anses' => array( self::RELATION_TYPE_HAS_MANY, 'PluginTest_ModuleTest_EntityAns', 'ask_id' ),
        'ans' => array( self::RELATION_TYPE_HAS_ONE, 'PluginTest_ModuleTest_EntityAns', 'ask_id'),
    );
    
     
    public function getCountAns() {
        return $this->PluginTest_Test_GetCountFromAnsByFilter(['ask_id' => $this->getId()]);
    }
    
    public function getUrlEdit() {
        return Router::GetPath('admin/plugin/test/ask/edit/'.$this->getId());
    }
    
    public function getMeidaImage($size){
        $aMedias = $this->image->getMedia();
        if($aMedias){           
            $oMedia = $aMedias[0];
            return $oMedia->getObject()->getWebPath($size);
        }
        return $this->getTest()->getDefaultImage($size);
    }

    public function afterSave() {
        parent::afterSave(); 
        
        if(!is_array( $aAnsesValues = $this->getAnsesValues() ) ){
            return false;
        }
        
        foreach ($this->getAnses() as $oAns) {
            $oAns->Delete();
        }

        foreach ($aAnsesValues as $sAns) {
            
            $oAns = Engine::GetEntity('PluginTest_Test_Ans');
            $oAns->setAskId( $this->getId() );
            $oAns->setValue( $sAns );
            
            if($sAns == $this->getRightAnsValue()){
                $oAns->setIsRight(true);
            }
            
            if($oAns->_Validate()){
                $oAns->Save(); 
                
            }else{
                foreach($oAns->_getValidateErrors() as $aError){
                    $this->Message_AddError($aError[0], $this->Lang_Get('common.error.error'));
                }
            }            
        }
    }
    
    public function afterDelete(){
        parent::afterDelete();
        
        if($aAnses = $this->getAnses()){
            foreach($aAnses as $oAns){
                $oAns->Delete();
            }           
        }
    }
}
{**
 * Форма добавления/редактирования типа теста
 *}
 
{$component = 'a-ask-form-add'}
{component_define_params params=[ 'oAsk', 'aAnses' ]}

{$aItemsBilets = [[]]}
{if $aBilets}
    {foreach $aBilets as $oBilet}
        {$aItemsBilets[] = [
             'value' => $oBilet->getId(),
             'text' => $oBilet->getTitle()
         ]}
    {/foreach}

{/if}

{* Формируем список категорий для select'а *}
{$items = [[]]}

{foreach $aCategories as $category}
    {$items[] = [ 'value' => $category->getId(), 'text' => $category->getTitle() ]}
{/foreach}

{* Формируем список ответов  *}
{$itemsAns=[]}
{if $oAsk}
    {foreach $oAsk->getAnses() as $ans}

        {if $ans->getIsRight()}
            {$activeItem = $ans->getValue()}
        {/if}

        {$itemsAns[] = $ans->getValue()}
    {/foreach}
{/if}


{component 'admin:p-form'
    attributes=[enctype => "multipart/form-data"] 
    isEdit=$oAsk 
    submit=[ name => 'ask_submit' , 'text' => $aLang.common.save] 
    form=[
        {component 'media:mfield' oBehavior=$oAsk->image},
        [ field => 'text',     name => 'ask[title]', label => 'Название' ],
        [ field => 'textarea',     name => 'ask[text]',  label => 'Вопрос' ],
        {component 'tinymce'  
            value={($oAsk)?$oAsk->getHintSource():''}  
            name = 'ask[hint_source]'  
            label = 'Подсказка'
            rows = 4},
        {component "test:field" template = 'fieldset'  items=$itemsAns activeItem=$activeItem   name = 'ask[anses_values][]' label = 'Ответы' },
        [ field => 'text', name => 'ask[order]', label => 'Порядок в билете', 'note' => 'Чем меньше тем выше'],
        [ field => 'select', name => 'ask[bilet_id]', label => 'Билет', items => $aItemsBilets ],
        [ field => 'select', name => 'ask[category]', label => 'Категория', items => $items]
]}

{* Показывает дополнительные поля *}

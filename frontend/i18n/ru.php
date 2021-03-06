<?php

return [
    'admin' => [
        'menu' => [
            'title' => 'Тесты',
            'settings' => 'Настройки'
        ],
        'test' => [
            'button_add' => [
                'text' => 'Добавить тип тестов'
            ],
            'notices' => [
                'add_success' => 'Тип тестов успешно добавлен'
            ],
            'validate_errors' => [
                'code_not_uniq' => 'Тип тестов с таким кодом уже существует',
                'category_type' => 'Не могу создать тип категорий'
            ]
        ],
        'bilet' => [
            'notices' => [
                'save_success' => 'Билет успешно сохранен',
                'no_test_find' => 'Тест не найден',
                'no_bilet_find' => 'Билет не найден'
            ],
            'error' => [
                'no_bilet' => 'Билет не найден'
            ]
        ]
    ],
    'main_menu' => [
        'tests' => [
            'text' => 'Обучение'
        ]
    ],
    'panel' => [
        'bilets' => [
            'text' => 'Билеты'
        ],
        'categories' => [
            'text' => 'Категории',
            'colls' => [
                'title' => 'Название',
                'count_asks' => 'Количество',
                'count_right' => 'Верно',
                'count_wrong' => 'Не верно'
            ]
        ],
        'bilet' => [
            'button_start' => 'Старт',
            'count_ask' => 'количество',
            'count_right' => 'Верно',
            'count_wrong' => 'Не верно'
        ],
        'hard' => [
            'title' => 'Самые сложные',
            'begin' => 'Начать тест',
            'text'  => 'В этом тесте программа обучения предлагает ответить на <b>%%count%%</b> самых сложных вопросов, '
            . 'выведеных из результатов тестирования всех пользователей сервиса.'
        ]
    ],
    'bilet' => [
        'error' => [
            'no_find' => 'Билет не найден'
        ]
    ],
    'ask' => [
        'error' => [
            'no_find' => 'Вопрос не найден'
        ],
        'form' => [
            'asn_but' => [
                'text' => 'Ответить'
            ],
            'next_but' => [
                'text' => 'Следующий'
            ],
            'skip_but' => [
                'text' => 'Пропустить'
            ],
            'finish_but' => [
                'text' => 'Завершить'
            ]
        ],
        'hint' => "Подсказка"
    ],
    'result' => [
        'validate' => [
            'no_ans_id' => 'Необходимо выбрать вариант ответа',
            'no_user' => 'Пользователь не найден',
            'no_user_current' => 'ID не соответствует текущему пользователю'
        ]
    ],
    'block' => [
        'panel_info' => [
            'ready' => 'Готовность',
            'title' => 'Информация',
            'list' => [
                'total_ask' => 'Всего вопросов',
                'wrong'     => 'Не верно',
                'right'     => 'Верно',
                'skip'      => 'Не пройдено',
                'total_time' => 'Общее время'
            ]
        ]
    ]
];
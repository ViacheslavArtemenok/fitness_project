<?php
return [
    'admin' => [
        'password' => [
            'change' => [
                'success' => 'Пароль успешно обновлен!',
                'fail' => 'Не удалось обновить пароль',
                'mismatch' => 'Старый пароль не совпадает!',
            ]
        ],
        'users' => [
            'create' => [
                'success' => 'Запись успешно добавлена',
                'fail' => 'Не удалось добавить запись'
            ],
            'update' => [
                'success' => 'Запись успешно обновлена',
                'fail' => 'Не удалось обновить запись'
            ],
            'destroy' => [
                'success' => 'Запись успешно удалена',
                'fail' => 'Не удалось удалить запись'
            ]
        ],
        'profiles' => [
            'create' => [
                'success' => 'Профиль успешно добавлен',
                'fail' => 'Не удалось добавить профиль',
            ],
            'update' => [
                'success' => 'Профиль успешно обновлен',
                'fail' => 'Не удалось обновить профиль'
            ],
            'destroy' => [
                'success' => 'Профиль успешно удален',
                'fail' => 'Не удалось удалить профиль'
            ],
        ],
        'skills' => [
            'create' => [
                'success' => 'Навыки успешно добавлены',
                'fail' => 'Не удалось добавить навыки',
            ],
            'update' => [
                'success' => 'Навыки успешно обновлены',
                'fail' => 'Не удалось обновить навыки'
            ],
            'destroy' => [
                'success' => 'Навыки успешно удалены',
                'fail' => 'Не удалось удалить навыки'
            ]
        ],
        'tags' => [
            'create' => [
                'success' => 'Тэг успешно добавлен',
                'fail' => 'Не удалось добавить тэг',
            ],
            'update' => [
                'success' => 'Тэг успешно обновлен',
                'fail' => 'Не удалось обновить тэг'
            ],
            'destroy' => [
                'success' => 'Тэг успешно удален',
                'fail' => 'Не удалось удалить тэг'
            ]
        ],
        'relations' => [
            'create' => [
                'success' => 'Отношение успешно добавлено',
                'fail' => 'Не удалось добавить отношение',
            ],
            'update' => [
                'success' => 'Отношение успешно обновлено',
                'fail' => 'Не удалось обновить отношение'
            ],
            'destroy' => [
                'success' => 'Отношение успешно удалено',
                'fail' => 'Не удалось удалить отношение'
            ]
        ],
        'characteristics' => [
            'create' => [
                'success' => 'Клиент успешно создан',
                'fail' => 'Не удалось создать клиента',
            ],
            'update' => [
                'success' => 'Клиент успешно обновлен',
                'fail' => 'Не удалось обновить клиента'
            ],
            'destroy' => [
                'success' => 'Клиент успешно удален',
                'fail' => 'Не удалось удалить клиента'
            ]
        ],
        'moderatings' => [
            'change' => [
                'success' => 'Анкета успешно подтверждена',
                'fail' => 'Анкета успешно отклонена'
            ]
        ],
        'roles' => [
            'create' => [
                'success' => 'Роль успешно создана',
                'fail' => 'Не удалось создать роль',
            ],
            'update' => [
                'success' => 'Роль успешно обновлена',
                'fail' => 'Не удалось обновить роль'
            ],
            'destroy' => [
                'success' => 'Роль успешно удалена',
                'fail' => 'Не удалось удалить роль'
            ]
        ],
        'gyms' => [
            'update' => [
                'success' => 'Запись успешно обновлена',
                'fail' => 'Не удалось обновить запись',
            ],
            'create' => [
                'success' => 'Запись успешно создана',
                'fail' => 'Не удалось создать запись',
            ]
        ],
        'gymAddresses' => [
            'update' => [
                'success' => 'Запись успешно обновлена',
                'fail' => 'Не удалось обновить запись',
            ],
            'create' => [
                'success' => 'Запись успешно создана',
                'fail' => 'Не удалось создать запись',
            ]
        ],
        'gymImages' => [
            'update' => [
                'success' => 'Запись успешно обновлена',
                'fail' => 'Не удалось обновить запись',
            ],
            'create' => [
                'success' => 'Запись успешно создана',
                'fail' => 'Не удалось создать запись',
            ]
        ]
    ],
    'account' => [
        'users' => [
            'update' => [
                'success' => 'Запись успешно обновлена',
                'fail' => 'Не удалось обновить запись'
            ],
        ],
        'profiles' => [
            'create' => [
                'success' => 'Профиль успешно добавлен',
                'fail' => 'Не удалось добавить профиль',
            ],
            'update' => [
                'success' => 'Профиль успешно обновлен',
                'fail' => 'Не удалось обновить профиль'
            ],
        ],
        'skills' => [
            'create' => [
                'success' => 'Навыки успешно добавлены',
                'fail' => 'Не удалось добавить навыки',
            ],
            'update' => [
                'success' => 'Навыки успешно обновлены',
                'fail' => 'Не удалось обновить навыки'
            ],
        ],
        'characteristics' => [
            'create' => [
                'success' => 'Данные анкеты успешно добавлены',
                'fail' => 'Не удалось добавить данные анкеты',
            ],
            'update' => [
                'success' => 'Данные анкеты успешно обновлены',
                'fail' => 'Не удалось обновить данные анкеты'
            ],
        ],
        'moderating' => [
            'success' => 'Заявка на активацию личного кабинета успешно отправлена!',
            'fail' => 'Не удалось отправить заявку на активацию личного кабинета!',
        ]
    ],
    'subscriptions' => [
        'create' => [
            'success' => 'Вы успешно подписаны на наши новости, акции и предложения',
            'fail' => 'Не удалось подписаться на нашу рассылку',
            'isset' => 'Не удалось подписаться на нашу рассылку, возможно данный телефон или email уже есть у нас в подписках',
        ]
    ],
    'reviews' => [
        'create' => [
            'success' => 'Спасибо за ваш отзыв!!! Скоро мы его проверим и добавим на сайт...',
            'fail' => 'Не удалось добавить отзыв',
            'danger' => 'Запрос заблокирован системой безопасности сайта!!!',
            'login' => 'Оставлять отзывы могут только авторизованные пользователи!!!',
            'attention' => 'Пройдите активацию личного кабинета, чтобы оставить отзыв...',
            'client' => 'Оставлять отзывы могут только пользователи в статусе "клиент"...',
        ],
    ]
];

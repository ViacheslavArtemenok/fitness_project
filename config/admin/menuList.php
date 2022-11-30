<?php

return [
    'house-door' => [
        'title' => 'Сменить пароль',
        'description' => 'Сменить пароль вашей страницы администратора',
        'url' => 'admin.changePassword',
    ],
    'microsoft-teams' => [
        'title' => 'Управление ролями',
        'description' => 'Роль пользователя определяет его права и доступный функционал на сайте',
        'url' => 'admin.roles.index',
    ],
    'people' => [
        'title' => 'Пользователи',
        'description' => 'Список входных данных при первичной регистрации',
        'url' => 'admin.users.index',
    ],
    'layout-text-sidebar' => [
        'title' => 'Профили',
        'description' => 'Подробные данные пользователя при заполнении в личном кабинете',
        'url' => 'admin.profiles.index',
    ],
    'card-list' => [
        'title' => 'Навыки и умения',
        'description' => 'Портфолио фитнес-тренера с информацией об опыте, навыках и достижениях в спорте',
        'url' => 'admin.skills.index',
    ],
    'tags' => [
        'title' => 'Теги',
        'description' => 'Стандартизованный список услуг фитнес-тренеров для удобного поиска на сайте',
        'url' => 'admin.tags.index',
    ],
    'tag' => [
        'title' => 'Тег-Тренер',
        'description' => 'Список тегов по видам тренировок у конкретного фитнес-тренера',
        'url' => 'admin.relations.index',
    ],
    'universal-access' => [
        'title' => 'Профиль клиентов',
        'description' => 'Сводная информация о физических характеристиках и уровне здоровья клиента фитнес-услуг',
        'url' => 'admin.characteristics.index',
    ],
    'person-lines-fill' => [
        'title' => 'Модерация',
        'description' => 'Таблица с заявками на активацию личного кабинета после заполнения либо редактирования данных',
        'url' => 'admin.moderatings.index',
    ],
    'tencent-qq' => [
        'title' => 'Фитнес-клубы',
        'description' => 'Информация с контактными данными и кратким описанием конкретного фитнес-клуба',
        'url' => 'admin.gyms.index',
    ],
    'geo' => [
        'title' => 'Адреса',
        'description' => 'Адрес фитнес-клуба или список адресов, если несколько филиалов в одном городе',
        'url' => 'admin.gymAddresses.index',
    ],
    'images' => [
        'title' => 'Галерея',
        'description' => 'Фотографии для каждого фитнес-клуба, первая из фотографий является главной',
        'url' => 'admin.gymImages.index',
    ],
    'mailbox' => [
        'title' => 'Рассылки',
        'description' => 'Страница для массовой рассылки разным категориям пользователей по электронной почте, рассылка в группу Телеграм',
        'url' => 'admin.send.index',
    ],
];

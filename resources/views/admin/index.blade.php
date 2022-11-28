@extends('layouts.admin')
@section('content')
    <h2 id="control_content"> О кабинете администратора</h2>
<main class="bd-main order-1">
    <div class="container">
        <ul class="nav flex-column">
            <li class="nav-item"><h3>Разделы кабинета</h3></li>
            <li class="nav-item">
                <a class="nav-link" href="#control_panel">
                    Панель управления
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#control_password">
                    Сменить пароль
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#control_rols">
                    Управление ролями
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#control_users">
                    Пользователи
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#control_profiles">
                    Профили
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#control_skills">
                    Навыки и умения
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#control_tags">
                    Теги
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#control_trainers">
                    Тег Тренер
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#control_clients">
                    Профиль клиентов
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#control_moderations">
                    Модерация
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#control_clubs">
                    Фитнес-клубы
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#control_caddresses">
                    Адреса фитнес-клубов
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#control_cimages">
                    Галерея фитнес-клубов
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#control_emails">
                    Почтовые рассылки
                </a>
            </li>
        </ul>
        <br>
        <div class="content">
            <div class="block">
                <h4 id="control_panel" class="block_header">Панель управления</h4>
                <p class="block_text">Данный раздел содержит информацию о разделах кабинета администрирования.</p>
                <a class="link text-decoration-none" href="#control_content">Вернуться к Разделам кабинета</a>
            </div>
            <div class="block">
                <h4 id="control_password" class="block_header">Сменить пароль</h4>
                <p class="block_text">Данный раздел кабинета администрирования сайта позволяет сменить пароль
                    текущему Администратору сайта. Для смены пароля необходимо знать текущий пароль Администратора,
                    ввести новый пароль в форму ввода пароля и подтвердить пароль повторным вводом.</p>
                <a class="link text-decoration-none" href="#control_content">Вернуться к Разделам кабинета</a>
            </div>
            <div class="block">
                <h4 id="control_rols" class="block_header">Управление ролями</h4>
                <p class="block_text">Данный раздел кабинета администрирования сайта позволяет управлять ролями пользователей
                    фитнес агрегатора. Создавать новую роль. Вносить изменения в описание существующей роли, а также при необходимости
                    удалить роль.</p>
                <a class="link text-decoration-none" href="#control_content">Вернуться к Разделам кабинета</a>
            </div>
            <div class="block">
                <h4 id="control_users" class="block_header">Пользователи</h4>
                <p class="block_text">Данный раздел кабинета администрирования сайта позволяет редактировать атрибуты
                    существующих пользователей. Создавать новых пользователей. При необходимости удалять пользователей.</p>
                <a class="link text-decoration-none" href="#control_content">Вернуться к Разделам кабинета</a>
            </div>
            <div class="block">
                <h4 id="control_profiles" class="block_header">Профили</h4>
                <p class="block_text">Данный раздел кабинета администрирования сайта позволяет изменять профили пользователей
                сайта. Создавать профили вновь созданных пользователей. При необходимости удалять пользователей.</p>
                <a class="link text-decoration-none" href="#control_content">Вернуться к Разделам кабинета</a>
            </div>
            <div class="block">
                <h4 id="control_skills" class="block_header">Навыки и умения</h4>
                <p class="block_text">Данный раздел кабинета администрирования сайта позволяет вносить изменения в навыки и
                умения пользователей с ролью тренер. Создавать навыки для новых тренеров. При необходимости удалять существующие
                навыки и умения.</p>
                <a class="link text-decoration-none" href="#control_content">Вернуться к Разделам кабинета</a>
            </div>
            <div class="block">
                <h4 id="control_tags" class="block_header">Теги</h4>
                <p class="block_text">Данный раздел кабинета администрирования сайта позволяет вносить изменения в теги.
                Создавать новые теги. Удалять при необходимости теги. Теги используются для поиска тренера на сайте фитнес клуба.</p>
                <a class="link text-decoration-none" href="#control_content">Вернуться к Разделам кабинета</a>
            </div>
            <div class="block">
                <h4 id="control_trainers" class="block_header">Тег Тренер</h4>
                <p class="block_text">Данный раздел кабинета администрирования сайта позволяет назначать теги тренерам. Добавлять или
                удалять теги.</p>
                <a class="link text-decoration-none" href="#control_content">Вернуться к Разделам кабинета</a>
            </div>
            <div class="block">
                <h4 id="control_clients" class="block_header">Профиль клиентов</h4>
                <p class="block_text">Данный раздел кабинета администрирования сайта позволяет вносить
                изменения в профили пользователей.</p>
                <a class="link text-decoration-none" href="#control_content">Вернуться к Разделам кабинета</a>
            </div>
            <div class="block">
                <h4 id="control_moderations" class="block_header">Модерация</h4>
                <p class="block_text">Данный раздел кабинета администрирования сайта позволяет модерировать анкеты новых
                    пользователей. Просматривать новые анкеты. Отклонять или одобрять новые анкеты. Алгоритм:
                    При регистрации пользователя ему присваивается статус draft, спустя какое-то время пользователь
                    заполняет данные в личном кабинете (тренер профиль, скиллы или клиент профиль, анкету...).
                    Как только пользователь заполнил все данные, ему открывается кнопка "активировать личный кабинет",
                    клик по этой кнопке отправляет новую заявку на модерацию в таблицу moderatings.</p>
                <a class="link text-decoration-none" href="#control_content">Вернуться к Разделам кабинета</a>
            </div>
            <div class="block">
                <h4 id="control_clubs" class="block_header">Фитнес-клубы</h4>
                <p class="block_text">Данный раздел кабинета администрирования сайта позволяет редактировать анкеты
                фитнес клубов. Создавать новые анкеты. Удалять при необходимости анкеты.</p>
                <a class="link text-decoration-none" href="#control_content">Вернуться к Разделам кабинета</a>
            </div>
            <div class="block">
                <h4 id="control_caddresses" class="block_header">Адреса фитнес-клубов</h4>
                <p class="block_text">Данный раздел кабинета администрирования сайта позволяет редактировать
                географические адреса фитнес клубов. Добавлять новые адреса существующим клубам. Удалять при необходимости.</p>
                <a class="link text-decoration-none" href="#control_content">Вернуться к Разделам кабинета</a>
            </div>
            <div class="block">
                <h4 id="control_cimages" class="block_header">Галерея фитнес-клубов</h4>
                <p class="block_text">Данный раздел кабинета администрирования сайта позволяет добавлять фотографии в галерею
                изображений фитнес клубов. Изменять, а также удалять при необходимости фотографии.</p>
                <a class="link text-decoration-none" href="#control_content">Вернуться к Разделам кабинета</a>
            </div>
            <div class="block">
                <h4 id="control_emails" class="block_header">Почтовые рассылки</h4>
                <p class="block_text">Данный раздел кабинета администрирования сайта позволяет осуществлять почтовую
                рассылку пользователям сайта. Рассылка электронной почты осуществляется по группам пользователей
                (администраторы, клиенты, тренеры, владельцы клубов и т.д.).</p>
                <a class="link text-decoration-none" href="#control_content">Вернуться к Разделам кабинета</a>
            </div>
        </div>
    </div>
</main>
@endsection

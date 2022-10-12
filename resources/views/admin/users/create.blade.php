@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <br>
        <h2>Добавить пользователя</h2>

        @include('inc.message')

        <form method="post" action="{{ route('admin.users.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="email">Электронная почта</label>
                <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
            </div>
            <div class="form-group">
                <label for="role">Роль</label>
                <select class="form-control" name="role" id="role">
                    <option selected value="{{ \App\Models\User::IS_ADMIN }}">Админ</option>
                    <option value="{{ \App\Models\User::IS_CLIENT }}">Клиент</option>
                    <option value="{{ \App\Models\User::IS_TRAINER }}">Тренер</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" name="password" id="password" value="">
            </div>
            <div class="form-group">
                <label for="confirmPassword">Пароль еще раз</label>
                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" value="">
            </div>
            <br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
@push('js')
@endpush

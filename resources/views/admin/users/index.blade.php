@extends('layouts.admin')
@section('content')
    <h2>Список пользователей</h2>
    <div style="display: flex; justify-content: right;">

    </div><br>
    <div class="alert-message"></div><br>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Элект почта</th>
                <th scope="col">Телефон</th>
                <th scope="col">Роль</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Дата проверки эл. почты</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                @php
                    switch ($user->role) {
                    case \App\Models\User::IS_ADMIN:
                            $role = 'Админ';
                            break;
                    case \App\Models\User::IS_CLIENT:
                            $role = 'Клиент';
                            break;
                    case \App\Models\User::IS_TRAINER:
                            $role = 'Тренер';
                            break;
                    }
                @endphp

                <tr id="row-{{ $user->id }}">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $role }}</td>
                    <td>{{ $user->email_verified_at }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <div style="">
                            <a href="#">Ред.</a>&nbsp;
                            <a href="#" class="delete" rel="{{ $user->id }}"
                               style="color: red;">Уд.</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Записей не найдено</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection

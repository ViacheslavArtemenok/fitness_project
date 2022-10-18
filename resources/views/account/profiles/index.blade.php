@extends('layouts.account')
@section('content')

    <h2>Профиль пользователя</h2>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Фото</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Фамилия</th>
                <th>Возраст</th>
                <th>Пол</th>
            </tr>
            </thead>
                <tbody>
                @if($user===null)
                    <tr>
                        <td colspan="5">Профиль пустой</td>
                    </tr>
                @else
                <tr>
                    <td>#</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->father_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->gender }}</td>
                </tr>
                @endif
                </tbody>

        </table>
    </div>
@endsection

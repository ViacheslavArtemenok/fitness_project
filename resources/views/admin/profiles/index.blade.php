@extends('layouts.admin')
@section('content')
    <h2>Профили пользователей</h2>
    <div style="display: flex; justify-content: right;">

    </div><br>
    <div class="alert-message"></div><br>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Аватар</th>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Отчество</th>
                <th scope="col">Возраст</th>
                <th scope="col">Пол</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($profiles as $profile)
                <tr id="row-{{ $profile->id }}">
                    <td>{{ $profile->id }}</td>
                    <td>{{ $profile->image }}</td>
                    <td>{{ $profile->first_name }}</td>
                    <td>{{ $profile->last_name }}</td>
                    <td>{{ $profile->father_name }}</td>
                    <td>{{ $profile->age }}</td>
                    <td>{{ $profile->gender }}</td>

                    <td>
                        <div style="">
                            <a href="#">Ред.</a>&nbsp;
                            <a href="#" class="delete" rel="{{ $profile->id }}"
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
        {{ $profiles->links() }}
    </div>
@endsection

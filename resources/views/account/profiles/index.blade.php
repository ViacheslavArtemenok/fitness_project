@extends('layouts.account')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

    </div>

    <h2>Профиль пользователя</h2>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Дата создания</th>
                <th>Роль</th>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <td>{{ $user_id }}</td>
                    <td>{{ $user_id }}</td>
                    <td>{{ $user_id }}</td>
                    <td>{{ $user_id }}</td>
                    <td>{{ $user_id }}</td>
                    <td>
                        <a href="">Редактировать</a>
                        {{--                        <a href="javascript:;" class="delete" rel="{{ $news->id }}" style="color: fuchsia">Удалить</a>--}}
                    </td>
                </tr>

                <tr>
                    <td colspan="5">Профиль пустой</td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection

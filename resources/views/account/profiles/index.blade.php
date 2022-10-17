@extends('layouts.account')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

    </div>
{{--{{  dd($profile->first_name) }}--}}
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

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="5">Профиль пустой</td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection

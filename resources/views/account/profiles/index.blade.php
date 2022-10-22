@extends('layouts.account')
@section('content')

    <h2>Профиль пользователя</h2>

    @include('inc.message')

    <div class="table-responsive">
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
                @if($profile===null)
                    <tr>
                        <td colspan="6"><a class="btn btn-primary" href="{{ route('account.profiles.create', ['profile'=> Auth::user()->id]) }}">Заполните профиль</a></td>
                    </tr>
                @else
                <tr>
                    <td><img src="{{ Storage::disk('public')->url($profile->image) }}" style="width: 100px"></td>
                    <td>{{ $profile->first_name }}</td>
                    <td>{{ $profile->father_name }}</td>
                    <td>{{ $profile->last_name }}</td>
                    <td>{{ $profile->age }}</td>
                    <td>{{ $profile->gender }}</td>
                </tr>
                @endif
                </tbody>
        </table>
    </div>
@endsection

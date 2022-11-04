@extends('layouts.admin')
@section('content')
    <h2>Модерировать анкету</h2>
    <div style="display: flex; justify-content: right;">
        {{--<a href="{{ route('admin.profiles.create') }}" class="btn btn-primary">Добавить профиль</a>--}}
    </div><br>
    <div class="alert-message"></div><br>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Идентификатор пользователя</th>
                <th scope="col">Роль пользователя</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Имя</th>
                <th scope="col">Отчество</th>
                <th scope="col">Статус</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($moderatings as $key => $moderating)
                <tr id="row-{{ $moderating->id }}">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $moderating->user_id }}</td>
                    <td>{!! !empty($moderating->user->role_id) ? $moderating->user->role_id : '' !!}</td>
                    <td>{{ $moderating->profile->last_name }}</td>
                    <td>{{ $moderating->profile->first_name }}</td>
                    <td>{{ $moderating->profile->father_name }}</td>
                    <td>{{ $moderating->status }}</td>
                    <td>
                        <div style="">
                            <a href="{{ route('admin.moderatings.edit', ['moderating' => $moderating]) }}">Чит.</a>&nbsp;
                            {{--<a href="javascript:;" class="delete" rel="{{ $profile->id }}"--}}
                               {{--style="color: red;">Уд.</a>--}}
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Записей не найдено</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $moderatings->links() }}
    </div>
@endsection

@push('js')
@endpush


@extends('layouts.admin')
@section('content')
    <h2>Модерировать анкету</h2>
    <div style="display: flex; justify-content: right;">
        {{-- <a href="{{ route('admin.profiles.create') }}" class="btn btn-primary">Добавить профиль</a> --}}
    </div><br>
    <div class="alert-message"></div><br>

    <div class="form-group">
        <span>Фильтровать по</span>
    </div>
    <div class="form-group">
        <label for="status">Статусу</label>
        <select class="form-control" name="status" id="status">
            @foreach ($statuses as $key => $status)
                <option @if ($status === 0) selected @endif value="{{ $key }}">
                    {{ $status }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="status">Роли</label>
        <select class="form-control" name="status" id="status">
            @foreach ($roles as $key => $role)
                <option @if ($role === 0) selected @endif value="{{ $key }}">
                    {{ $role['role'] }}
                </option>
            @endforeach
        </select>
    </div>
    <br>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Идентификатор пользователя</th>
                    <th scope="col">Роль пользователя</th>
                    <th scope="col">Статус пользователя</th>
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
                        <td>{!! !empty($moderating->user->role_id) ? $roles[$moderating->user->role_id - 1]['role'] : '' !!}</td>
                        <td>{!! !empty($moderating->user->status) ? $moderating->user->status : '' !!}</td>
                        <td>
                            @if (isset($moderating->profile->last_name))
                                {{ $moderating->profile->last_name }}
                            @endif
                        </td>
                        <td>
                            @if (isset($moderating->profile->first_name))
                                {{ $moderating->profile->first_name }}
                            @endif
                        </td>
                        <td>
                            @if (isset($moderating->profile->father_name))
                                {{ $moderating->profile->father_name }}
                            @endif
                        </td>
                        <td>{{ $moderating->status }}</td>
                        <td>
                            <div style="">
                                <a
                                    href="{{ route('admin.moderatings.edit', ['moderating' => $moderating]) }}">Модерировать</a>&nbsp;
                                {{-- <a href="javascript:;" class="delete" rel="{{ $profile->id }}" --}}
                                {{-- style="color: red;">Уд.</a> --}}
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">Записей не найдено</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $moderatings->links() }}
    </div>
@endsection

@push('js')
@endpush

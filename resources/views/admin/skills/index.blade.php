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
                <th scope="col">Расположение</th>
                <th scope="col">Образоваие</th>
                <th scope="col">Опыт</th>
                <th scope="col">Достижения</th>
                <th scope="col">Описание</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($skills as $skill)
                <tr id="row-{{ $skill->id }}">
                    <td>{{ $skill->id }}</td>
                    <td>{{ $skill->location }}</td>
                    <td>{{ $skill->education }}</td>
                    <td>{{ $skill->experience }}</td>
                    <td>{{ $skill->achievements }}</td>
                    <td>{{ $skill->description }}</td>

                    <td>
                        <div style="">
                            <a href="#">Ред.</a>&nbsp;
                            <a href="#" class="delete" rel="{{ $skill->id }}"
                               style="color: red;">Уд.</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Записей не найдено</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $skills->links() }}
    </div>
@endsection

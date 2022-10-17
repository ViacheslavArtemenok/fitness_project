@extends('layouts.admin')
@section('content')
    <h2>Управление тегами</h2>
    <div style="display: flex; justify-content: right;">
        <a href="#" class="btn btn-primary">Добавить тег</a>
    </div><br>
    <div class="alert-message"></div><br>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Тег</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($tags as $tag)
                <tr id="row-{{ $tag->id }}">
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->tag }}</td>
                    <td>{{ $tag->created_at }}</td>

                    <td>
                        <div style="">
                            <a href="#">Ред.</a>&nbsp;
                            <a href="javascript:;" class="delete" rel="{{ $tag->id }}"
                               style="color: red;">Уд.</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Записей не найдено</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $tags->links() }}
    </div>
@endsection

@push('js')
@endpush

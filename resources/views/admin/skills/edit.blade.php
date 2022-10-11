@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <br>
        <h2>Редактировать пользователя</h2>

        @include('inc.message')

        <form method="post" action="{{ route('admin.skills.update', ['skill' => $skill]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="location">Расположение</label>
                <input type="text" class="form-control" name="location" id="location" value="{{ $skill->location }}">
            </div>
            <div class="form-group">
                <label for="education">Образоваие</label>
                <input type="text" class="form-control" name="education" id="education" value="{{ $skill->education }}">
            </div>
            <div class="form-group">
                <label for="experience">Опыт</label>
                <input type="text" class="form-control" name="experience" id="experience" value="{{ $skill->experience }}">
            </div>
            <div class="form-group">
                <label for="achievements">Достижения</label>
                <input type="text" class="form-control" name="achievements" id="achievements" value="{{ $skill->achievements }}">
            </div>
            <div class="form-group">
                <label for="desciption">Описание</label>
                <input type="text" class="form-control" name="description" id="description" value="{{ $skill->description }}">
            </div>
           <br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
@push('js')
@endpush

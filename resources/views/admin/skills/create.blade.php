@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <br>
        <h2>Добавить навыки</h2>

        @include('inc.message')

        <form method="post" action="{{ route('admin.skills.store') }}">
            @csrf
            <div class="form-group">
                <label for="location">Расположение</label>
                <input type="text" class="form-control" name="location" id="location" value="{{ old('location') }}">
            </div>
            <div class="form-group">
                <label for="education">Образоваие</label>
                <input type="text" class="form-control" name="education" id="education" value="{{ old('education') }}">
            </div>
            <div class="form-group">
                <label for="experience">Опыт</label>
                <input type="text" class="form-control" name="experience" id="experience" value="{{ old('experience') }}">
            </div>
            <div class="form-group">
                <label for="achievements">Достижения</label>
                <input type="text" class="form-control" name="achievements" id="achievements" value="{{ old('achievements') }}">
            </div>
            <div class="form-group">
                <label for="skillList">Список навыков</label>
                <input type="text" class="form-control" name="skills_list" id="skillList" value="{{ old('skills_list') }}">
            </div>
            <div class="form-group">
                <label for="desciption">Описание</label>
                <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}">
            </div>
            <br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
@push('js')
@endpush

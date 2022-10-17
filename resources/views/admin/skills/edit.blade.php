@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <br>
        <h2>Редактировать навыки</h2>

        @include('inc.message')

        <form method="post" action="{{ route('admin.skills.update', ['skill' => $skill]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="last_name">Фамилия</label>
                <input type="text" class="form-control" readonly name="last_name" id="last_name" value="{{ $skill->profile->last_name }}">
            </div>
            <div class="form-group">
                <label for="first_name">Имя</label>
                <input type="text" class="form-control" readonly name="first_name" id="first_name" value="{{ $skill->profile->first_name }}">
            </div>
            <div class="form-group">
                <label for="father_name">Отчество</label>
                <input type="text" class="form-control" readonly name="father_name" id="father_name" value="{{ $skill->profile->father_name }}">
            </div>
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
                <label for="skillList">Список навыков</label>
                <input type="text" class="form-control" name="skills_list" id="skillList" value="{{ $skill->skills_list }}">
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

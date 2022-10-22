@extends('layouts.account')
@section('content')
    <div class="offset-2 col-8">
        <h2>Заполнение навыков</h2>

        @include('inc.message')
        <form method="post" action="{{ route('account.skills.store', ['user_id'=>$user_id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="location">Расположение</label>
                <input type="text" class="form-control" name="location" id="location" value="{{ old('location') }}">
                @error('location') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="education">Образование</label>
                <textarea type="text" class="form-control" name="education" id="education">{{ old('education') }}</textarea>
                @error('education') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="experience">Опыт</label>
                <input type="number" class="form-control" name="experience" id="experience" value="{{ old('experience') }}">
                @error('experience') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="achievements">Достижения</label>
                <textarea type="text" class="form-control" name="achievements" id="achievements">{{ old('achievements') }}</textarea>
                @error('achievements') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="skills_list">Список навыков</label>
                <textarea type="text" class="form-control" name="skills_list" id="skills_list">{{ old('skills_list') }}</textarea>
                @error('skills_list') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea type="text" class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                @error('description') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection


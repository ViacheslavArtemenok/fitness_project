@extends('layouts.account')
@section('content')
    <div class="offset-2 col-8">
        <h2>Заполнение навыков</h2>

        @include('inc.message')
        <form method="post" action="{{ route('account.skills.store', ['user_id'=>$user_id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="location">location</label>
                <input type="text" class="form-control" name="location" id="location" value="{{ old('location') }}">
                @error('location') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="education">education</label>
                <input type="text" class="form-control" name="education" id="education" value="{{ old('education') }}">
                @error('education') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="experience">experience</label>
                <input type="number" class="form-control" name="experience" id="experience" value="{{ old('experience') }}">
                @error('experience') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="achievements">achievements</label>
                <input type="text" class="form-control" name="achievements" id="achievements" value="{{ old('achievements') }}">
                @error('achievements') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="skills_list">skills_list</label>
                <input type="text" class="form-control" name="skills_list" id="skills_list" value="{{ old('skills_list') }}">
                @error('skills_list') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="description">description</label>
                <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}">
                @error('description') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection


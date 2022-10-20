@extends('layouts.account')
@section('content')
    <div class="offset-2 col-8">
        <h2>Редактирование навыков</h2>

        @include('inc.message')

        @if($skill===null){

<h2>Профиль пустой</h2>
    }
        @endif
        <form method="post" action="{{ route('account.skills.update', ['skill'=>$skill]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="location">location</label>
                <input type="text" class="form-control" name="location" id="location" value="{{ $skill->location }}">
                @error('location') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="education">education</label>
                <input type="text" class="form-control" name="education" id="education" value="{{ $skill->education }}">
                @error('education') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="experience">experience</label>
                <input type="number" class="form-control" name="experience" id="experience" value="{{ $skill->experience }}">
                @error('experience') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="achievements">achievements</label>
                <input type="text" class="form-control" name="achievements" id="achievements" value="{{ $skill->achievements }}">
                @error('achievements') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="skills_list">skills_list</label>
                <input type="text" class="form-control" name="skills_list" id="skills_list" value="{{ $skill->skills_list }}">
                @error('skills_list') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="description">description</label>
                <input type="text" class="form-control" name="description" id="description" value="{{ $skill->description }}">
                @error('description') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection



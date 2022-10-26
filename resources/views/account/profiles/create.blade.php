@extends('layouts.account')
@section('content')
    <div class="offset-2 col-8">
        <h2>Заполнение профиля</h2>

        @include('inc.message')
        <form method="post" action="{{ route('account.profiles.store', ['user_id'=>$user_id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="first_name">Имя</label>
                <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name') }}">
                @error('first_name') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="father_name">Отчество</label>
                <input type="text" class="form-control" name="father_name" id="father_name" value="{{ old('father_name') }}">
                @error('father_name') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="last_name">Фамилия</label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}">
                @error('last_name') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="age">Возраст</label>
                <input type="number" class="form-control" name="age" id="age" value="{{ old('age') }}">
                @error('age') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="gender">Пол</label>
                <input type="text" class="form-control" name="gender" id="gender" value="{{ old('gender') }}">
                @error('gender') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection


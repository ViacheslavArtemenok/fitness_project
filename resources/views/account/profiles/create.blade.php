@extends('layouts.main')
@section('content')
    @if (Auth::user()->role === 'IS_TRAINER')
        <x-account.trainer.menu></x-account.trainer.menu>
    @elseif(Auth::user()->role === 'IS_CLIENT')
        <x-account.client.menu></x-account.client.menu>
    @endif
    <div class="offset-2 col-8">
        <hr class="featurette-divider">
        <h2>Заполнение профиля</h2>


        <form method="post" action="{{ route('account.profiles.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="text" name="user_id" id="user_id" value="{{ Auth::user()->id }}" hidden>
            <div class="form-group">
                <label for="first_name">Имя</label>
                <input type="text" class="form-control" name="first_name" id="first_name"
                    value="{{ old('first_name') }}">
                @error('first_name')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="father_name">Отчество (Если нет отчества, ставим ...)</label>
                <input type="text" class="form-control" name="father_name" id="father_name"
                    value="{{ old('father_name') }}">
                @error('father_name')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="last_name">Фамилия</label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}">
                @error('last_name')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="age">Возраст</label>
                <input type="number" class="form-control" name="age" id="age" value="{{ old('age') }}">
                @error('age')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="gender" @error('gender') style="color:red" @enderror>Пол</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="0">Выбрать</option>
                    <option value="male" @if (old('gender') === 'male') selected @endif>Мужской</option>
                    <option value="female" @if (old('gender') === 'female') selected @endif>Женский</option>
                </select>
                @error('gender')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <br>
            <button class="btn btn-outline-success" type="submit">Сохранить</button>
        </form>
    </div>
    <hr class="featurette-divider">
@endsection

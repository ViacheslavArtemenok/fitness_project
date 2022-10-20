@extends('layouts.account')
@section('content')
    <div class="offset-2 col-8">
        <h2>Редактирование профиля</h2>

        @include('inc.message')

        @if($profile===null){

<h2>Профиль пустой</h2>
    }
        @endif
        <form method="post" action="{{ route('account.profiles.update', ['profile'=>$profile]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')

            <img src="{{ Storage::disk('public')->url($profile->image) }}" style="width: 100px">
            <br>
            <br>
            <div class="form-group">
                <label for="first_name">Имя</label>
                <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $profile->first_name }}">
                @error('first_name') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="father_name">Отчество</label>
                <input type="text" class="form-control" name="father_name" id="father_name" value="{{ $profile->father_name }}">
                @error('father_name') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="last_name">Фамилия</label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $profile->last_name }}">
                @error('last_name') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="age">Возраст</label>
                <input type="number" class="form-control" name="age" id="age" value="{{ $profile->age }}">
                @error('age') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="gender">Пол</label>
                <input type="text" class="form-control" name="gender" id="gender" value="{{ $profile->gender }}">
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



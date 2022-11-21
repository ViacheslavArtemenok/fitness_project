@extends('layouts.main')
@section('content')
        <x-account.gym.menu></x-account.gym.menu>
    <div class="offset-2 col-8">
        <hr class="featurette-divider">
        <h2>Добавление фото</h2>
        <form method="post" action="{{ route('account.gym_images.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="text" name="gym_id" id="gym_id" value="{{ Auth::user()->gym->id }}" hidden>
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

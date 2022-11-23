@extends('layouts.main')
@section('content')
        <x-account.gym.menu></x-account.gym.menu>
    <div class="offset-2 col-8">
        <hr class="featurette-divider">
        <h2>Замена фотографии</h2>
        @if ($gym_image === null)
            {
            <h2>Фотографий не</h2>
            }
        @endif
        <form method="post" action="{{ route('account.gym_images.update', ['gym_image' => $gym_image]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="text" name="gym_id" id="gym_id" value="{{ $gym_image->gym_id }}" hidden>
            <img src="@if ($gym_image->image) {{ Storage::disk('public')->url($gym_image->image) }} @else /assets/images/user.jpg @endif"
                class="m-2 rounded-2 border border-secondary border-2 border-opacity-10 avatar">
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

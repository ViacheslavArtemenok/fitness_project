@extends('layouts.account')
@section('content')
    <div class="offset-2 col-8">
        <h2>Редактирование характеристик</h2>

        @include('inc.message')

        @if ($characteristic === null)
            {
            <h2>Характеристик нет</h2>
            }
        @endif
        <form method="post" action="{{ route('account.characteristics.update', ['characteristic' => $characteristic]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="text" name="user_id" id="user_id" value="{{ Auth::user()->id }}" hidden>
            <div class="form-group">
                <label for="location">Расположение</label>
                <input type="text" class="form-control" name="location" id="location"
                       value="{{ $characteristic->location }}">
                @error('location')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="height">Рост</label>
                <input type="number" class="form-control" name="height" id="height"
                    value="{{ $characteristic->height }}">
                @error('height')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="weight">Вес</label>
                <input type="number" class="form-control" name="weight" id="weight"
                    value="{{ $characteristic->weight }}">
                @error('weight')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="health">Группа здоровья</label>
                <input type="text" class="form-control" name="health" id="health"
                    value="{{ $characteristic->health }}">
                @error('health')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="description">Описание</label>
                <input type="text" class="form-control" name="description" id="description" value="{{ $characteristic->description }}">
                @error('description')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <br>
            <button class="btn btn-outline-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection

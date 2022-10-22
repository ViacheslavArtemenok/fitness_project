@extends('layouts.account')
@section('content')

    <div class="offset-2 col-8">
        <h2>Редактирование пользователя</h2>

        @include('inc.message')

        <form method="post" action="{{ route('account.users.update', ['user'=>$user]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" class="form-control" name="name" id="name" value = "{{ $user->name }}">
                @error('name') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="email">Email адрес</label>
                <input type="text" class="form-control" name="email" id="email" value = "{{ $user->email }}">
                @error('name') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" name="password" id="password" value = "">
                @error('password') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="confirmPassword">Повторите пароль</label>
                <input id="confirmPassword" class="form-control"
                              type="password"
                              name="confirmPassword">
                @error('confirmPassword') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <div class="form-group">
                <input class="form-control" type="hidden" name="role" id="role" value="{{ $user->role }}">
            </div>
            <br>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="tel" name="phone" class="mask-phone form-control" data-format="+7 (ddd) ddd-dd-dd" value = "{{ $user->phone }}">
                @error('phone') <span style="color: red">{{ $message }}</span> @enderror
            </div>
            <br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>

@endsection

@push('js')
    <script src="{{ asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery.maskedinput.min.js') }}" type="text/javascript"></script>
<script>
    jQuery(function($){
    $('.mask-phone').mask('+7 (999) 999-99-99');
    });
</script>
@endpush

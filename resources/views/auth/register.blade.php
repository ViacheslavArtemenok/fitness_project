@extends('layouts.main')
@section('title')
    Регистрация
    @parent
@endsection
@section('content')
    <hr class="featurette-divider">

    <div class="container">

        <div class="card">
            <div class="card-header">
                {{ __('Регистрация') }}
            </div>
            <div class="card-body d-flex align-items-start flex-wrap">
                <img class="w-25 me-4 align-self-center" src="/assets/images/reg.jpg" alt="img">
                <form class="flex-grow-1" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name"
                            class="col-md-4 col-form-label text-md-end">{{ __('Имя или псевдоним') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Телефон') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="tel"
                                class="mask-phone form-control @error('phone') is-invalid @enderror" name="phone"
                                value="{{ old('phone') }}" data-format="+7 (ddd) ddd-dd-dd" required autocomplete="phone">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email адрес') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="role" class="col-md-4 col-form-label text-md-end"
                            @error('role')
                        style="color:red"
                    @enderror>Цель
                            регистрации</label>
                        <div class="col-md-6">
                            <select class="form-control" name="role" id="role">
                                <option value="0">Выбрать</option>
                                <option value="IS_TRAINER" @if (old('role') === 'IS_TRAINER') selected @endif>Вы тренер и
                                    хотите
                                    создать анкету
                                    с портфолио</option>
                                <option value="IS_CLIENT" @if (old('role') === 'IS_CLIENT') selected @endif>Вы
                                    клиент, ищете тренера, клуб,
                                    хотите оставить отзыв
                                </option>
                                <option value="IS_GYM" @if (old('role') === 'IS_GYM') selected @endif>Вы представитель
                                    фитнес-клуба
                                </option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Пароль') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-end">{{ __('Подтвердить пароль') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-outline-success">
                                {{ __('Зарегистрироваться') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr class="featurette-divider">
    <script src="{{ asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery.maskedinput.min.js') }}" type="text/javascript"></script>
    <script>
        jQuery(function($) {
            $('.mask-phone').mask('+7 (999) 999-99-99');
        });
    </script>
@endsection

@extends('layouts.account')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('inc.message')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Личный кабинет') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <br>
                    <p>Имя: {{ Auth::user()->name }}</p>
                    <p>Телефон: {{ Auth::user()->phone }}</p>
                    <p>Email: {{ Auth::user()->email }}</p>
                    <p>Дата регистрации: {{ Auth::user()->created_at->format('d.m.Y') }}</p>
                    <p>Последняя авторизация:
                        @if(Auth::user()->last_login_at)
                        {{ Auth::user()->last_login_at->format('H:i d.m.Y') }}
                        @else{{ Auth::user()->created_at->format('H:i d.m.Y') }}
                        @endif
                    </p>
                </div>
            </div>
            <br>

        </div>
    </div>
</div>
@endsection

{{--{{ route('admin.index') }}--}}

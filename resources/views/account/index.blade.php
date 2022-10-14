@extends('layouts.account')
@section('content')
    @include('inc.message')
    @php $message = "Test message"; @endphp
    <br>
    <x-alert type="warning" :message="$message"></x-alert>
    <x-alert type="success" :message="$message"></x-alert>
    <x-alert type="primary" :message="$message"></x-alert>
    <x-alert type="danger" :message="$message"></x-alert>
    <x-alert type="info" :message="$message"></x-alert>

    <h1>Индекс страница</h1>

    @if(Auth::user())
        <div class="p-6 bg-white border-b border-gray-200">
            <p>Здравствуйте, {{ Auth::user()->name }}!</p>
            <br>
            @if(Auth::user()->role === 'IS_ADMIN')
                <a class="btn btn-primary" href="{{ route('admin.index') }}">Администрировать</a>
            @endif
        </div>
    @endif

@endsection


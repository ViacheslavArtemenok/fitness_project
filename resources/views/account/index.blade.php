@extends('layouts.account')
@section('content')

<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                @if(Auth::user())
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>Здравствуйте, {{ Auth::user()->name }}!</p>
                    <br>
                    @if(Auth::user()->role === 'IS_ADMIN')
                        <a class="btn btn-primary" href="{{ route('admin.index') }}">Администрировать</a>
                    @endif
                </div>
                @endif

        </div>
    </div>

</x-app-layout>

@endsection

{{--{{ route('admin.index') }}--}}

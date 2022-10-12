@extends('layouts.account')
@section('content')

<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(Auth::user())
                <div class="p-6 bg-white border-b border-gray-200">
                    <h>Здравствуйте, {{ Auth::user()->name }}!</h>
                    <br>
                    @if(Auth::user()->role === '0')
                        <a href="">В админку</a>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>

@endsection

{{--{{ route('admin.index') }}--}}

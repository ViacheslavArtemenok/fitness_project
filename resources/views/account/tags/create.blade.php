@extends('layouts.account')
@section('content')
    <div class="offset-2 col-8">
        <br>
        <h2>Добавить теги</h2>

        @include('inc.message')

        <form method="post" action="{{ route('account.tags.store', ['id' => $user_id]) }}">
            @csrf
            <div class="form-group">
                @forelse($tags as $tagItem)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tagItem->id }}" id="tag">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{ $tagItem->tag }}
                        </label>
                    </div>
                @empty
                    <a class="btn btn-secondary mb-2 me-2"
                       href="{{ route('account.tags.create', ['tag' => Auth::user()->id]) }}">
                        Профили отсутствуют
                    </a>
                @endforelse
            </div>
            <br>
            <button class="btn btn-success" type="submit">Добавить</button>
        </form>
    </div>
@endsection
@push('js')
@endpush

@extends('layouts.main') @section('title')
    Команда разработки @parent
    @endsection @section('content')
    <div class="container marketing">
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="fw-normal lh-1 mb-4">{{ $main['title'] }}</h2>
                @foreach ($main['list'] as $key => $item)
                    <div class="d-flex align-items-end shadow-lg p-3 w-50">
                        <img class="rounded-circle shadow-lg mb-2"
                            src="{{ asset('assets/images/hacker_' . $key + 1 . '.png') }}" alt="img">
                        <h5 class="fw-normal ms-4"> {{ $item }}</h5>
                    </div>
                @endforeach
            </div>
            <div class="col-md-5">
                <img class="market_image" src="{{ asset('assets/images/developers_1.jpg') }}" alt="img">
            </div>
        </div>

        <div class="d-flex flex-wrap justify-content-between shadow-lg p-4 mt-4 rounded-2">
            @for ($i = 0; $i < $main['sourceCount']; $i++)
                <img class="m-1" src="{{ asset('assets/images/source_' . $i + 1 . '.png') }}" alt="img">
            @endfor
        </div>


    </div>

    <hr class="featurette-divider">
    </div>
@endsection

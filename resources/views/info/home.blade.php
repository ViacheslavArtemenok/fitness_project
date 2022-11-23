@extends('layouts.main') @section('title')
    Главная @parent
    @endsection @section('content')
    <!-- HOME -->
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators promo_info">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @forelse($promoList as $key => $promoItem)
                <div class="carousel-item @if ($key === 0) active @endif">
                    <div class="dark_glass">
                        <img src="{{ asset('assets/images/slider-image' . $key + 1 . '.jpg') }}" alt="img"
                            class="promo_image">
                    </div>
                    <svg class="bd-placeholder-img" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect fill="#777" />
                    </svg>

                    <div class="container promo_info">
                        <div class="carousel-caption text-start">
                            <h1>{{ $promoItem['title'] }}</h1>
                            <p>{{ $promoItem['description'] }}</p>
                            <a class="btn btn-lg btn-outline-success"
                                @if ($key === 2) href="#phone_mask" 
                                @else 
                                href="{{ route('trainers.index', ['tag_id' => 0, 'city_id' => 0]) }}" @endif>Подробнее</a>
                        </div>
                    </div>
                </div>
            @empty
                <h2>Записей нет</h2>
            @endforelse

        </div>
        <button class="carousel-control-prev promo_info" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next promo_info" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container marketing">
        <hr class="featurette-divider">
        @forelse($marketList as $key => $marketItem)
            <div class="row featurette">
                <div class="col-md-7 @if ($key % 2 === 0) order-md-2 @endif">
                    <h2 class="featurette-heading fw-normal lh-1">{{ $marketItem['title'] }}</h2>
                    <p class="lead">{{ $marketItem['description'] }}</p>
                    <a class="btn btn-lg btn-outline-secondary" href="{{ $marketItem['url'] }}"
                        target="_blank">Подробнее</a>
                </div>
                <div class="col-md-5">
                    <img class="market_image" src="{{ asset('assets/images/market_' . $key + 1 . '.jpg') }}" alt="img">
                </div>
            </div>
            <hr class="featurette-divider">
        @empty
            <h2>Записей нет</h2>
        @endforelse
    </div>
@endsection

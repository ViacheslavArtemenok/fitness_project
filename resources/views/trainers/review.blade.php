@extends('layouts.main')
@section('title')
    Отзыв на тренера: @if (isset($trainer))
        {{ $trainer->profile->first_name }} {{ $trainer->profile->father_name }} {{ $trainer->profile->last_name }}
    @endif
    @parent
@endsection
@section('content')
    <div class="d-flex align-items-center body_back">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-4">
                <li class="breadcrumb-item"><a class="text-white-50 link-success"
                        href="{{ route('trainers.index', ['tag_id' => 0, 'city_id' => $city_id]) }}">Тренеры</a></li>
                <li class="breadcrumb-item"><a class="text-white-50 link-success"
                        href="{{ route('trainers.show', ['id' => $trainer_id, 'city_id' => $city_id]) }}">{{ $trainer->profile->first_name }}
                        {{ $trainer->profile->last_name }}</a></li>
                <li class="breadcrumb-item text-white-50" aria-current="page">Отзывы</li>
            </ol>
        </nav>
    </div>
    <div class="container marketing">
        <hr class="featurette-divider">
        @if ($trainer && $client)
            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading fw-normal lh-1">{{ $trainer->profile->first_name }}
                        {{ $trainer->profile->father_name }}
                        {{ $trainer->profile->last_name }}</h2>
                    <div class="d-flex">
                        <h4>Рейтинг: @if (count($trainer->clients))
                                {{ $trainerBuilder->getScore($trainer->clients) }}
                            @else
                                Нет оценки
                            @endif
                        </h4>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#daa520"
                            class="bi bi-star mt-1 ms-2" viewBox="0 0 16 16">
                            <path fill="#daa520"
                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                        </svg>
                    </div>
                    <p class="lead">Город: {{ $trainer->skill->location }}</p>
                    <p class="lead">Телефон: {{ $trainer->phone }}</p>
                    <p class="lead">Email: {{ $trainer->email }}</p>
                    <p class="lead">Возраст: {{ $trainer->profile->age }}
                        {{ $trainerBuilder->getUnitCase($trainer->profile->age) }}</p>
                    <p class="lead">Опыт: {{ $trainer->skill->experience }}
                        {{ $trainerBuilder->getUnitCase($trainer->skill->experience) }}</p>
                    <div class="d-flex flex-wrap align-items-start">
                        @forelse($trainer->tags as $key => $tagItem)
                            <a class="btn btn-secondary mb-2 me-2"
                                href="{{ route('trainers.index', ['tag_id' => $tagItem->id, 'city_id' => $city_id]) }}">
                                {{ $tagItem->tag }}
                            </a>
                        @empty
                            <a class="btn btn-secondary mb-2 me-2"
                                href="{{ route('trainers.index', ['tag_id' => 0, 'city_id' => $city_id]) }}">
                                Профиль тренировок не указан
                            </a>
                        @endforelse
                    </div>
                    <a class="btn btn-outline-danger mt-3 mb-2 me-2"
                        href="{{ route('trainers.show', ['id' => $trainer_id, 'city_id' => $city_id]) }}">&#9668 &#9668
                        &#9668 Назад
                    </a>
                </div>
                <div class="col-md-5">
                    <img class="market_image" src="{{ Storage::disk('public')->url($trainer->profile->image) }}"
                        alt="img">
                </div>
            </div>


            <!--Отзыв-->
            @foreach ($client->trainers as $review)
                @if ($review->pivot->id === $review_id && $review->pivot->status === 'ACTIVE')
                    <div class="row featurette mt-4">
                        <div class="bg-light p-3 ps-4 rounded-1 shadow">
                            <h3>Тема отзыва</h3>
                            <h4 class="fw-normal">{{ $review->pivot->title }}</h4>
                            <h3>Описание</h3>
                            <h5 class="fw-normal">{{ $review->pivot->description }}</h5>
                            <p class="fw-bold">{{ $review->pivot->created_at->format('d.m.Y (H:i)') }}</p>
                            <div class="d-flex shadow mb-2 rounded-1 w-50">
                                <img class="m-2 w-25 rounded-2 border border-secondary border-2 border-opacity-10"
                                    src="{{ Storage::disk('public')->url($client->profile->image) }}" alt="img">
                                <div class="d-flex flex-grow-1 align-self-center justify-content-center">
                                    <h5 class="fw-semibold">{{ $client->profile->first_name }}
                                        {{ $client->profile->last_name }},
                                        {{ $client->profile->age }}
                                        {{ $trainerBuilder->getUnitCase($client->profile->age) }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <hr class="featurette-divider">
            <h1>Искомый отзыв у нас не зарегистрирован...</h1>
            <hr class="featurette-divider">
        @endif
        <hr class="featurette-divider">
    @endsection
@extends('layouts.main')
@section('title')
    Тренер: @if (isset($trainer))
        {{ $trainer->profile->first_name }} {{ $trainer->profile->father_name }} {{ $trainer->profile->last_name }}
    @endif
    @parent
@endsection
@section('content')
    <!-- TEAM -->
    <div class="container marketing">
        <hr class="featurette-divider">
        @if ($trainer)
            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading fw-normal lh-1">{{ $trainer->profile->first_name }}
                        {{ $trainer->profile->father_name }}
                        {{ $trainer->profile->last_name }}</h2>
                    <div class="d-flex">
                        <h4>Рейтинг: {{ $trainerBuilder->getScore($trainer->trainer_reviews) }}</h4>
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
                </div>
                <div class="col-md-5">
                    <img class="market_image" src="{{ Storage::disk('public')->url($trainer->profile->image) }}"
                        alt="img">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="bg-light p-3 ps-4 rounded-1 shadow">
                    <h3>Образование</h3>
                    <p>{{ $trainer->skill->education }}</p>
                    <h3>Навыки</h3>
                    @foreach (explode('. ', $trainer->skill->skills_list) as $item)
                        <p>&bull; {{ rtrim($item, '.') }}</p>
                    @endforeach
                    <h3>Достижения</h3>
                    @foreach (explode('. ', $trainer->skill->achievements) as $item)
                        <p>&bull; {{ rtrim($item, '.') }}</p>
                    @endforeach
                    <h3>О себе</h3>
                    <p>{{ $trainer->skill->description }}</p>
                </div>
            </div>
        @else
            <hr class="featurette-divider">
            <h1>Искомый тренер у нас не зарегистрирован...</h1>
            <hr class="featurette-divider">
        @endif
        <hr class="featurette-divider">
        <div class="container px-4 py-5" id="featured-3">
            <h2 class="pb-2 border-bottom">Отзывы</h2>
            <div class="row g-5 py-5 row-cols-1 row-cols-lg-3">
                <!--Карточка отзыва -->
                @forelse($trainer->trainer_reviews as $key => $review)
                    <div class="feature col">
                        <div class="p-3 bg-light rounded-1 shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000"
                                class="bi bi-chat-left-text-fill" viewBox="0 0 16 16">
                                <path
                                    d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z" />
                            </svg>
                            <h4>{{ mb_substr($review->pivot->title, 0, 20) . '...' }}</h4>
                            <p>{{ mb_substr($review->pivot->description, 0, 90) . '...' }}</p>
                            <h6>{{ $review->name }}</h6>
                            <p>{{ $review->pivot->created_at->format('d.m.Y (H:i)') }}</p>
                            <a href="#" class="btn btn-outline-secondary align-items-center">
                                Подробнее
                            </a>
                        </div>
                    </div>
                @empty
                    <h2>Пока нет отзывов</h2>
                @endforelse
            </div>
        </div>
    @endsection

@extends('layouts.main')
@section('title')
    Список тренеров @parent
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-center body_back">
        <div class="dropdown p-3 d-flex justify-content-center flex-grow-1">
            <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                @if ($tag_id !== 0)
                    {{ $tags[$tag_id - 1]->tag }}
                @else
                    Категории тренировок
                @endif
            </button>
            <div class="tags_box body_back dropdown-menu">
                <div class="container">
                    <div class="body_back p-4">
                        @if (!request()->is("*/0/$city_id"))
                            <a class="mb-2 me-1 btn btn-outline-success"
                                href="{{ route('trainers.index', ['tag_id' => 0, 'city_id' => $city_id]) }}">
                                Все категории
                            </a>
                        @endif
                        @foreach ($tags as $tag)
                            <a class="mb-2 me-1 btn btn-outline-secondary @if (request()->is("*/$tag->id/$city_id")) active @endif"
                                href="{{ route('trainers.index', ['tag_id' => $tag->id, 'city_id' => $city_id]) }}">
                                {{ $tag->tag }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <h4 class="me-4"> {{ config('cities')[$city_id] }} </h4>
    </div>
    <div class="container marketing">
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-normal lh-1">Список фитнес-тренеров</h2>
                <p class="lead">Здесь можно ознакомиться с анкетами, получить контактные данные и подробную информацию о
                    каждом фитнес-тренере</p>
            </div>
        </div>
        @if (request()->firstName || request()->lastName)
            <h3>Результаты поиска: <span class="fw-lighter">{{ request()->firstName }}
                    {{ request()->lastName }}</span></h3>
        @endif
        <hr class="featurette-divider">
        <!-- Three columns of text below the carousel -->
        <div class="trainers_box">
            @forelse($trainersList as $key => $trainer)
                <div class="item_box">
                    <img src="{{ $trainer->profile->image }}" class="bd-placeholder-img trainers_image" alt="img">
                    <h3 class="fw-normal trainers_name">{{ $trainer->profile->first_name }}
                        {{ $trainer->profile->last_name }}</h3>
                    <p>Возраст: {{ $trainer->profile->age }} {{ $trainerBuilder->getUnitCase($trainer->profile->age) }}
                    </p>
                    <p>Опыт: {{ $trainer->skill->experience }}
                        {{ $trainerBuilder->getUnitCase($trainer->skill->experience) }}</p>
                    <p>Город: {{ $trainer->skill->location }}</p>
                    <p>Категории тренировок:</p>
                    <div class="flex-grow-1">
                        <div class="d-flex flex-wrap align-items-start">
                            @forelse($trainer->tags as $key => $tagItem)
                                <p class="btn btn-secondary btn-sm disabled me-2 pt-0 pb-0 ps-1 pe-1">
                                    {{ $tagItem->tag }}
                                </p>
                            @empty
                                <p class="btn btn-secondary btn-sm disabled me-2 pt-0 pb-0 ps-1 pe-1">
                                    Профиль тренировок не указан
                                </p>
                            @endforelse
                        </div>
                    </div>
                    <a class="btn btn-outline-secondary"
                        href="{{ route('trainers.show', ['id' => $trainer->id, 'city_id' => $city_id]) }}">Подробнее
                        &raquo;</a>
                </div>
                <!-- /.col-lg-4 -->
            @empty
                <h2>Список пуст</h2>
            @endforelse
        </div><!-- /.row -->
        @if (request() && count($trainersList))
            {{ $trainersList->appends(['firstName' => request()->firstName, 'lastName' => request()->lastName])->links() }}
        @elseif(!request() && count($trainersList))
            {{ $trainersList->links() }}
        @endif
        <hr class="featurette-divider">
    </div>
@endsection;

@extends('layouts.main')
@section('title')
    Список тренеров @parent
@endsection
@section('content')
    <div class="container marketing">
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-normal lh-1">Список фитнес-тренеров</h2>
                <p class="lead">Здесь можно ознакомиться с анкетами, получить подробную информацию и контактные данные
                    о
                    каждом фитнес-тренере</p>
            </div>
        </div>
        <hr class="featurette-divider">
        <!-- Three columns of text below the carousel -->
        <div class="trainers_box">
            @forelse($trainersList as $key => $trainer)
                <div class="item_box">
                    <a href="{{ route('trainers.show', ['id' => $trainer->id]) }}"><img src="{{ $trainer->profile->image }}"
                            class="bd-placeholder-img trainers_image" alt="img">
                    </a>
                    <h2 class="fw-normal trainers_name">{{ $trainer->profile->first_name }}
                        {{ $trainer->profile->last_name }}</h2>
                    <p>Возраст: {{ $trainer->profile->age }} {{ $trainerBuilder->getUnitCase($trainer->profile->age) }}</p>
                    <p>Опыт: {{ $trainer->skill->experience }}
                        {{ $trainerBuilder->getUnitCase($trainer->skill->experience) }}</p>
                    <p>Город: {{ $trainer->skill->location }}</p>
                    <p class="trainers_text">Навыки: {{ $trainer->skill->skills_list }}</p>
                    <p><a class="btn btn-outline-secondary"
                            href="{{ route('trainers.show', ['id' => $trainer->id]) }}">Подробнее &raquo;</a></p>
                </div>
                <!-- /.col-lg-4 -->
            @empty
                <h2>Записей нет</h2>
            @endforelse
        </div><!-- /.row -->
        {{ $trainersList->links() }}
        <hr class="featurette-divider">
    </div>
@endsection

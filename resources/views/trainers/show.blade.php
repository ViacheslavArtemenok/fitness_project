@extends('layouts.main')
@section('title')
    Тренер: {{ $trainer->profile->first_name }} {{ $trainer->profile->father_name }} {{ $trainer->profile->last_name }}
    @parent
@endsection
@section('content')
    <!-- TEAM -->
    <div class="container marketing">
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading fw-normal lh-1">{{ $trainer->profile->first_name }}
                    {{ $trainer->profile->father_name }}
                    {{ $trainer->profile->last_name }}</h2>
                <p class="lead">Город: {{ $trainer->skill->location }}</p>
                <p class="lead">Телефон: {{ $trainer->phone }}</p>
                <p class="lead">Email: {{ $trainer->email }}</p>
                <p class="lead">Возраст: {{ $trainer->profile->age }}
                    {{ $trainerBuilder->getUnitCase($trainer->profile->age) }}</p>
                <p class="lead">Опыт: {{ $trainer->skill->experience }}
                    {{ $trainerBuilder->getUnitCase($trainer->skill->experience) }}</p>
            </div>
            <div class="col-md-5">
                <img class="market_image" src="{{ $trainer->profile->image }}" alt="img">
            </div>
        </div>

        <div class="row featurette">
            <hr class="featurette-divider">
            <h3>Образование</h3>
            <p>{{ $trainer->skill->education }}</p>
            <h3>Навыки</h3>
            <p>{{ $trainer->skill->skills_list }}</p>
            <h3>Достижения</h3>
            <p>{{ $trainer->skill->achievements }}</p>
            <h3>О себе</h3>
            <p>{{ $trainer->skill->description }}</p>
        </div>
        <hr class="featurette-divider">
    </div>
@endsection

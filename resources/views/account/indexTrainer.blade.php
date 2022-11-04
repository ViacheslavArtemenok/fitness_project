@extends('layouts.main')
@section('content')
    <x-account.trainer.menu></x-account.trainer.menu>
    <br>
    <div class="container marketing">
        <hr class="featurette-divider">
        @if (Auth::user()->status === 'BLOCKED')
            <h3 class="text-center text-danger mb-4">Личный кабинет заблокирован по решению администрации сайта</h3>
        @elseif(Auth::user()->status === 'DRAFT')
            <h6 class="text-center text-danger mb-4">Ваш профиль еще не активирован! Заполните поля с данными профиля,
                навыков и выберите подходящие тэги
                тренировок...
                Как всё будет готово, появится кнопка 'активировать', нажмите ее, наш
                администратор проверит вашу анкету и выполнит активацию.</h6>
            @if ($user->profile && $user->skill)
                <a class="btn btn-outline-success btn-sm mb-3 ms-1"
                    href="{{ route('account.tags.create', ['user_id' => $user->id]) }}">
                    Активировать
                </a>
            @endif
        @endif
        @if ($user)
            <div class="d-flex shadow mb-4 rounded-1 p-4">
                <img class="m-2 rounded-2 border border-secondary border-2 border-opacity-10 avatar"
                    src="@if (isset($user->profile->image)) {{ Storage::disk('public')->url($user->profile->image) }} @else /assets/images/user.jpg @endif"
                    alt="img">
                <!--Блок с личными данными-->
                <div class="d-flex flex-column flex-grow-1 ps-4 pt-1">
                    <h5 class="fw-bold">
                        @if ($user->profile)
                            {{ $user->profile->first_name }}
                            {{ $user->profile->father_name }}
                            {{ $user->profile->last_name }} <img
                                class="mt-0 ms-2 me-3 indicator @if (Auth::user()->status === 'ACTIVE') indicator_green @else indicator_red @endif"
                                src="@if (Auth::user()->status === 'ACTIVE') /assets/images/yes.jpg @else /assets/images/no.jpg @endif"
                                alt="img">
                        @else
                            {{ $user->name }} <img
                                class="mt-0 ms-2 me-3 indicator @if (Auth::user()->status === 'ACTIVE') indicator_green @else indicator_red @endif"
                                src="@if (Auth::user()->status === 'ACTIVE') /assets/images/yes.jpg @else /assets/images/no.jpg @endif"
                                alt="img">
                        @endif
                    </h5>
                    <table class="table w-50">
                        <thead>
                            <tr>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Рейтинг:</th>
                                @if (count($user->clients))
                                    <td>{{ $trainerBuilder->getScore($user->clients) }} <svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#daa520"
                                            class="bi bi-star mt-1 ms-1" viewBox="0 0 16 16">
                                            <path fill="#daa520"
                                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                        </svg></td>
                                @else
                                    <td>Нет оценки</td>
                                @endif
                            </tr>
                            @if ($user->skill)
                                <tr>
                                    <th scope="row">Город:</th>
                                    <td>{{ $user->skill->location }}</td>
                                </tr>
                            @endif
                            @if ($user->profile)
                                <tr>
                                    <th scope="row">Возраст:</th>
                                    <td>{{ $user->profile->age }} {{ $trainerBuilder->getUnitCase($user->profile->age) }}
                                    </td>
                                </tr>
                            @endif
                            @if ($user->skill)
                                <tr>
                                    <th scope="row">Опыт:</th>
                                    <td>{{ $user->skill->experience }}
                                        {{ $trainerBuilder->getUnitCase($user->skill->experience) }}</td>
                                </tr>
                            @endif
                            <tr>
                                <th scope="row">Телефон:</th>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email:</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex flex-wrap align-items-start mb-4">
                        @forelse($user->tags as $key => $tagItem)
                            <a class="btn btn-secondary btn-sm mb-2 me-2"
                                href="{{ route('trainers.index', ['tag_id' => $tagItem->id, 'city_id' => 0]) }}">
                                {{ $tagItem->tag }}
                            </a>
                        @empty
                            <a class="btn btn-secondary btn-sm mb-2 me-2"
                                href="{{ route('account.tags.create', ['user_id' => $user->id]) }}">
                                Профиль тренировок не указан
                            </a>
                        @endforelse
                    </div>
                </div>
            </div>
            @if ($user->skill)
                <div class="shadow skill_bottom p-4 rounded">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Образование</th>
                                <th class="text-center">Навыки</th>
                                <th class="text-center">Достижения</th>
                                <th class="text-center w-25">О себе</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $user->skill->education }}</td>
                                <td>
                                    @foreach (explode('. ', $user->skill->skills_list) as $item)
                                        <div>&bull; {{ rtrim($item, '.') }}</div>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach (explode('. ', $user->skill->achievements) as $item)
                                        <div>&bull; {{ rtrim($item, '.') }}</div>
                                    @endforeach
                                </td>
                                <td>{{ $user->skill->description }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @else
                <hr class="featurette-divider">
            @endif
        @else
            <hr class="featurette-divider">
            <h1>Искомый тренер у нас не зарегистрирован...</h1>
            <hr class="featurette-divider">
        @endif
    </div>
    <hr class="featurette-divider">
@endsection

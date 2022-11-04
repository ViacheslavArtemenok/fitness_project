@extends('layouts.main')
@section('content')
    <x-account.client.menu></x-account.client.menu>
    <br>
    <div class="container marketing">
        <hr class="featurette-divider">
        @if (Auth::user()->status === 'BLOCKED')
            <h3 class="text-center text-danger mb-4">Личный кабинет заблокирован по решению администрации сайта</h3>
        @elseif(Auth::user()->status === 'DRAFT')
            <h6 class="text-center text-danger mb-4">Ваш профиль еще не активирован! Заполните поля с данными профиля,
                анкеты...
                Как всё будет готово, появится кнопка 'активировать', нажмите ее, наш
                администратор проверит вашу анкету и выполнит активацию.</h6>
            @if ($user->profile && $user->characteristic)
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
                            @if ($user->profile)
                                <tr>
                                    <th scope="row">Возраст:</th>
                                    <td>{{ $user->profile->age }} {{ $trainerBuilder->getUnitCase($user->profile->age) }}
                                    </td>
                                </tr>
                            @endif
                            @if ($user->characteristic)
                                <tr>
                                    <th scope="row">Город:</th>
                                    <td>{{ $user->characteristic->location }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Рост:</th>
                                    <td>{{ $user->characteristic->height }} см</td>
                                </tr>
                                <tr>
                                    <th scope="row">Вес:</th>
                                    <td>{{ $user->characteristic->weight }} кг</td>
                                </tr>
                                <tr>
                                    <th scope="row">Группа здоровья:</th>
                                    <td>{{ $user->characteristic->health }}</td>
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
                    @if ($user->characteristic)
                        <div class="w-75 p-4 mb-4 shadow rounded-1">
                            <table class="table">
                                <thead>
                                    <tr>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="w-25">О себе:</th>
                                        <td class="w-75">{{ $user->characteristic->description }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
            <div class="w-100 p-3 mb-4 shadow rounded-1">
                <h6>Группы здоровья<h6>
                        <p>А – Возможны занятия физической культурой без ограничений и участие в соревнованиях.</p>
                        <p>B – Возможны занятия физической культурой с незначительными ограничениями физических нагрузок без
                            участия в соревнованиях.</p>
                        <p>C - Возможны занятия физической культурой со значительными ограничениями физических нагрузок.</p>
                        <p>D – Возможны занятия только лечебной физкультурой.</p>
            </div>
            @if (count($user->trainers) > 0)
                <div class="w-100 p-4 mb-4 shadow rounded-1">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="row">#</th>
                                <th scope="row">Ник тренера</th>
                                <th scope="row">Тема отзыва</th>
                                <th scope="row">Описание</th>
                                <th scope="row">Дата</th>
                                <th scope="row">Статус</th>
                                <th scope="row">Подробнее</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->trainers as $key => $review)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $review->name }}</td>
                                    <td>{{ mb_substr($review->pivot->title, 0, 30) . '...' }}</td>
                                    <td>{{ mb_substr($review->pivot->description, 0, 55) . '...' }}</td>
                                    <td>{{ $review->pivot->created_at->format('d.m.Y') }}</td>
                                    <td>
                                        @if ($review->pivot->status === 'ACTIVE')
                                            Активен
                                        @elseif ($review->pivot->status === 'DRAFT')
                                            На модерации
                                        @else
                                            Заблокирован
                                        @endif
                                    </td>
                                    <td>
                                        @if ($review->pivot->status === 'ACTIVE')
                                            <a class="btn btn-outline-success btn-sm"
                                                href="{{ route('trainers.review', [
                                                    'review_id' => $review->pivot->id,
                                                    'client_id' => $user->id,
                                                    'trainer_id' => $review->id,
                                                    'city_id' => 0,
                                                ]) }}">&#10004;</a>
                                        @elseif ($review->pivot->status === 'DRAFT')
                                            <a class="btn btn-outline-primary btn-sm"
                                                href="{{ route('trainers.review', [
                                                    'review_id' => $review->pivot->id,
                                                    'client_id' => $user->id,
                                                    'trainer_id' => $review->id,
                                                    'city_id' => 0,
                                                ]) }}">&#128736;</a>
                                        @else
                                            <a class="btn btn-outline-danger btn-sm ps-2 pe-2"
                                                href="{{ route('trainers.review', [
                                                    'review_id' => $review->pivot->id,
                                                    'client_id' => $user->id,
                                                    'trainer_id' => $review->id,
                                                    'city_id' => 0,
                                                ]) }}">??</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <hr class="featurette-divider">
            @endif
        @else
            <hr class="featurette-divider">
            <h1>Искомый клиент у нас не зарегистрирован...</h1>
            <hr class="featurette-divider">
        @endif
    </div>
    <hr class="featurette-divider">
@endsection

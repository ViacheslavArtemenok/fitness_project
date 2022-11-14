@extends('layouts.main')
@section('content')
    <x-account.gym.menu></x-account.gym.menu>
    <br>
    <div class="container marketing">
        @if (Auth::user()->status === 'BLOCKED')
            <h3 class="text-center text-danger mb-4">Личный кабинет заблокирован по решению администрации сайта</h3>
        @elseif(Auth::user()->status === 'DRAFT')
            <div class="d-flex flex-column align-items-center p-3 shadow rounded-1 mb-4">
                <h6 class="text-center text-secondary"><span class="text-danger">Ваш профиль еще не активирован!</span>
                    Заполните поля с данными профиля,
                    анкеты в разделе "Редактировать", при регистрации вам было
                    отправлено письмо на ваш email. Пройдите по ссылке
                    в письме, чтобы подтвердить ваш email...
                    Как всё будет готово, появится кнопка "Активировать", нажмите ее, наш
                    администратор проверит вашу анкету и выполнит активацию.</h6>
                @if ($user->profile && $user->characteristic && Auth::user()->email_verified_at)
                    <a class="btn btn-outline-success btn-sm @if ($user->moderating and $user->moderating->status === 'IS_PENDING') disabled @endif"
                        href="{{ route('account.moderating', ['user_id' => $user->id]) }}">
                        @if ($user->moderating and $user->moderating->status === 'IS_PENDING')
                            Отправлено на активацию&nbsp;&nbsp;&#9203;
                        @else
                            Активировать&nbsp;&nbsp;&#10004;
                        @endif
                    </a>
                @endif
                @if (!Auth::user()->email_verified_at)
                    <p class="text-success">Отправить письмо повторно?</p>
                    <form action="{{ route('verification.send') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-success btn-sm">
                            Отправить&nbsp;&nbsp;&#9993;
                        </button>
                    </form>
                @endif
            </div>
        @endif
        <hr class="featurette-divider">
        @if ($user)
            <div class="d-flex shadow mb-4 rounded-1 p-4">
                <img class="m-2 rounded-2 border border-secondary border-2 border-opacity-10 avatar"
                    src="@if (isset($user->profile->image)) {{ Storage::disk('public')->url($user->profile->image) }} @else /assets/images/user.jpg @endif"
                    alt="img">
                <!--Блок с личными данными-->
                <div class="d-flex flex-column flex-grow-1 ps-4 pt-1">
                    <div class="d-flex">
                        <h5 class="fw-bold">
                            @if ($user->profile)
                                {{ $user->profile->first_name }}
                                {{ $user->profile->father_name }}
                                {{ $user->profile->last_name }}
                            @else
                                {{ $user->name }}
                            @endif
                        </h5>
                        <div class="d-flex">
                            <img class="mt-1 ms-3 me-3 indicator @if (Auth::user()->status === 'ACTIVE') indicator_green @else indicator_red @endif"
                                src="@if (Auth::user()->status === 'ACTIVE') /assets/images/yes.jpg @else /assets/images/no.jpg @endif"
                                alt="img">
                            <img class="mt-1 ms-0 me-3 indicator @if (Auth::user()->email_verified_at) indicator_green @else indicator_red @endif"
                                src="@if (Auth::user()->email_verified_at) /assets/images/yes.jpg @else /assets/images/no.jpg @endif"
                                alt="img">
                        </div>
                    </div>
                    <table class="table w-50">
                        <thead>
                            <tr>

                            </tr>
                        </thead>
                        <tbody>
                            @if ($user->profile)
                                <tr>
                                    <th scope="row">Возраст:</th>
                                    <td>{{ $user->profile->age }}
                                        {{ $trainerBuilder->getUnitCase($user->profile->age) }}
                                    </td>
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
                            <tr>
                                <th scope="row" class="w-25"></th>
                                <td class="w-75"></td>
                            </tr>
                            <tr>
                                <th scope="row" class="w-25">Фитнес-клуб:</th>
                                <td class="w-75">{{ $user->gym->title }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="w-25">Телефон:</th>
                                <td class="w-75">{{ $user->gym->phone_main }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="w-25">Телефон:</th>
                                <td class="w-75">{{ $user->gym->phone_second }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="w-25">Email:</th>
                                <td class="w-75">{{ $user->gym->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Описание -->
                    @if ($user->gym)
                        <div class="w-75 p-4 mb-4 shadow rounded-1">
                            <table class="table">
                                <thead>
                                    <tr>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="w-25">Ссылка:</th>
                                        <td class="w-75"><a class="btn btn-outline-primary btn-sm" target="blank"
                                                href="{{ $user->gym->url }}">{{ $user->gym->title }}</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="w-25">Описание:</th>
                                        <td class="w-75">{{ $user->gym->description }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
            <!-- Галерея -->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    @foreach ($user->gym->images as $key => $image)
                        <button type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide-to="{{ $key }}"
                            @if ($key === 0) class="active" aria-current="true" @endif
                            aria-label="Slide {{ $key + 1 }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($user->gym->images as $key => $image)
                        <div class="carousel-item @if ($key === 0) active @endif">
                            <img src="{{ $image->image }}" class="d-block w-100" alt="image">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Предыдущий</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Следующий</span>
                </button>
            </div>
            <!-- Адреса -->
            <div class="w-100 p-3 mb-4 shadow rounded-1">
                <h5 class="text-center mb-4">Адреса филиалов</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="row">#</th>
                            <th scope="row">Страна</th>
                            <th scope="row">Индекс</th>
                            <th scope="row">Город</th>
                            <th scope="row">Улица</th>
                            <th scope="row">Дом</th>
                            <th scope="row">Строение</th>
                            <th scope="row">Этаж</th>
                            <th scope="row">Офис</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->gym->addresses as $key => $address)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $address->country }}</td>
                                <td>{{ $address->index }}</td>
                                <td>{{ $address->city }}</td>
                                <td>{{ $address->street }}</td>
                                <td>{{ $address->house_number }}</td>
                                <td>{{ $address->building }}</td>
                                <td>{{ $address->floor }}</td>
                                <td>{{ $address->apartment }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <hr class="featurette-divider">
            <h1>Искомый контакт у нас не зарегистрирован...</h1>
            <hr class="featurette-divider">
        @endif
    </div>
    <hr class="featurette-divider">
@endsection

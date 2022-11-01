@extends('layouts.account')
@section('content')
    @include('inc.message')
    <br>
    @if (Auth::user()->status !== 'BLOCKED')
        <h2 class="text-center">Личный кабинет</h2>
    @else
        <h3 class="text-center text-danger">Личный кабинет заблокирован по решению администрации сайта</h3>
    @endif
    <div class="container marketing skill_bottom">
        <hr class="featurette-divider">
        <h3>После заполнения профиля, навыков и тэгов измените статус на ACTIVE в базе</h3>
        @if ($user)
            <div class="d-flex shadow mb-4 rounded-1">
                <img class="m-2 rounded-2 border border-secondary border-2 border-opacity-10 avatar"
                    src="@if (isset($user->profile->image)) {{ Storage::disk('public')->url($user->profile->image) }} @else /assets/images/user.jpg @endif"
                    alt="img">
                <!--Блок с личными данными-->
                <div class="d-flex flex-column flex-grow-1 ps-4 pt-1">
                    <h5 class="fw-semibold">
                        @if ($user->profile)
                            {{ $user->profile->first_name }}
                            {{ $user->profile->father_name }}
                            {{ $user->profile->last_name }}
                        @else
                            {{ $user->name }}
                        @endif
                    </h5>
                    <table class="table w-25">
                        <tbody>
                            @if (Auth::user()->role === 'IS_TRAINER' and $user->skill)
                                <tr>
                                    <th scope="row">Город:</th>
                                    <td>{{ $user->skill->location }}</td>
                                </tr>
                            @endif
                            @if (Auth::user()->role === 'IS_CLIENT' and $user->characteristic)
                                <tr>
                                    <th scope="row">Город:</th>
                                    <td>{{ $user->characteristic->location }}</td>
                                </tr>
                            @endif
                            @if ($user->profile)
                                <tr>
                                    <th scope="row">Возраст:</th>
                                    <td>{{ $user->profile->age }}</td>
                                </tr>
                            @endif
                            @if (Auth::user()->role === 'IS_TRAINER' and $user->skill)
                                <tr>
                                    <th scope="row">Опыт:</th>
                                    <td>{{ $user->skill->experience }}</td>
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
                </div>
            </div>

            @if (Auth::user()->role === 'IS_TRAINER')
                @if ($user->skill)
                    <table class="table shadow">
                        <thead>
                            <tr>
                                <th scope="col">Образование</th>
                                <th scope="col">Навыки</th>
                                <th scope="col">Достижения</th>
                                <th scope="col">О себе</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $user->skill->education }}</td>
                                <td>{{ $user->skill->skills_list }}</td>
                                <td>{{ $user->skill->achievements }}</td>
                                <td>{{ $user->skill->description }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex flex-wrap align-items-start table shadow">
                        @forelse($user->tags as $key => $tagItem)
                            <a class="btn btn-secondary btn-sm mb-2 me-2">
                                {{ $tagItem->tag }}
                            </a>
                        @empty
                            <a class="btn btn-secondary btn-sm mb-2 me-2 "
                               href="{{ route('account.tags.create', ['user_id' => $user->id]) }}">
                                Профиль тренировок не указан
                            </a>
                        @endforelse
                    </div>
                @else
                    <hr class="featurette-divider">
                    <a class="btn btn-secondary mb-2 me-2" href="{{ route('account.profiles.create') }}">
                        Заполните профиль
                    </a>
                    <a class="btn btn-secondary mb-2 me-2" href="{{ route('account.skills.create') }}">
                        Заполните навыки
                    </a>
                @endif
            @endif

            @if (Auth::user()->role === 'IS_CLIENT')
                @if ($user->characteristic)
                    <table class="table shadow">
                        <h3 class="text-center">Характеристики</h3>
                        <thead>
                            <tr>
                                <th scope="col">Рост</th>
                                <th scope="col">Вес</th>
                                <th scope="col">Группа здоровья</th>
                                <th scope="col">Описание</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $user->characteristic->height }}</td>
                                <td>{{ $user->characteristic->weight }}</td>
                                <td>{{ $user->characteristic->health }}</td>
                                <td>{{ $user->characteristic->description }}</td>
                            </tr>
                        </tbody>
                    </table>
                @else
                    <hr class="featurette-divider">
                    <a class="btn btn-secondary mb-2 me-2" href="{{ route('account.characteristics.create') }}">
                        Заполните характеристику
                    </a>
                @endif
            @endif

        @else
            <hr class="featurette-divider">
            <h1>Искомый пользователь у нас не зарегистрирован...</h1>
            <hr class="featurette-divider">
        @endif
    </div>
@endsection

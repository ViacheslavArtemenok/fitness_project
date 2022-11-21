@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <br>
        @include('inc.message')
        <h2>
            {{ $moderatingList->profile->last_name }}
            {{ $moderatingList->profile->first_name }}
            {{ $moderatingList->profile->father_name }}
        </h2>
        <div class="container">
            <div class="row">
                <fieldset class="form-group border p-3 mb-4">
                    <legend class="w-auto px-3 reset" align="left">Пользователь</legend>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><span class="">Никнейм: </span>{{ $moderatingList->user->name }}
                        </li>
                        <li class="list-group-item"><span class="">Электр. почта: </span>{{ $moderatingList->user->email }}
                        </li>
                        <li class="list-group-item"><span class="">Телефон: </span> {{ $moderatingList->user->phone }}
                        </li>
                    </ul>
                </fieldset>
            </div>
        </div>
        @if(isset($moderatingList->profile))
            <div class="container">
                <div class="row">
                    <fieldset class="form-group border p-3 mb-4">
                        <legend class="w-auto px-3 reset" align="left">Профиль пользователя</legend>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span
                                        class="">Возраст: </span>{{ $moderatingList->profile->age }}
                            </li>
                            <li class="list-group-item"><span
                                        class="">Пол: </span>{{ $moderatingList->profile->gender }}
                            </li>
                            <li class="list-group-item"><span class="">Аватар: </span>
                                <div class="">
                                    @if(isset($moderatingList->profile->image))
                                        <img class="market_image"
                                             src="{{ Storage::disk('public')->url($moderatingList->profile->image) }}"
                                             alt="img" style="width: 100px">
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </fieldset>
                </div>
            </div>
        @endif
        @if(isset($moderatingList->skill))
            <div class="container">
                <div class="row">
                    <fieldset class="form-group border p-3 mb-4">
                        <legend class="w-auto px-3 reset" align="left">Навыки</legend>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span
                                        class="">Расположение: </span>{{ $moderatingList->skill->location }}</li>
                            <li class="list-group-item"><span
                                        class="">Образование:  </span>{{ $moderatingList->skill->education }}</li>
                            <li class="list-group-item"><span
                                        class="">Опыт: </span>{{ $moderatingList->skill->experience }}</li>
                            <li class="list-group-item"><span
                                        class="">Достижения: </span>{{ $moderatingList->skill->achievements }}</li>
                            <li class="list-group-item"><span
                                        class="">Список навыков: </span>{{ $moderatingList->skill->skills_list }}
                            </li>
                            <li class="list-group-item"><span
                                        class="">Описание: </span>{{ $moderatingList->skill->description }}</li>
                        </ul>
                    </fieldset>
                </div>
            </div>
        @endif
        @if(collect($moderatingList->tags)->isNotEmpty())
            <div class="container">
                <div class="row">
                    <fieldset class="form-group border p-3 mb-4">
                        <legend class="w-auto px-3 reset" align="left">Тэги:</legend>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                @forelse($moderatingList->tags as $tag)
                                    <span class="">{{ $tag['tag'] }}</span><br>
                                @empty
                                    <span class="">Тэгов нет</span>
                                @endforelse
                            </li>
                        </ul>
                    </fieldset>
                </div>
            </div>
        @endif
        @if(isset($moderatingList->characteristic))
            <div class="container">
                <div class="row">
                    <fieldset class="form-group border p-3 mb-4">
                        <legend class="w-auto px-3 reset" align="left">Навыки</legend>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span
                                        class="">Расположение: </span>{{ $moderatingList->characteristic->location }}</li>
                            <li class="list-group-item"><span
                                        class="">Рост:  </span>{{ $moderatingList->characteristic->height }}</li>
                            <li class="list-group-item"><span
                                        class="">Вес: </span>{{ $moderatingList->characteristic->weight }}</li>
                            <li class="list-group-item"><span
                                        class="">Группа здоровья: </span>{{ $moderatingList->characteristic->health }}</li>
                            <li class="list-group-item"><span
                                        class="">Описание: </span>{{ $moderatingList->characteristic->description }}</li>
                        </ul>
                    </fieldset>
                </div>
            </div>
        @endif
        @if(isset($moderatingList->gym))
            <div class="container">
                <div class="row">
                    <fieldset class="form-group border p-3 mb-4">
                        <legend class="w-auto px-3 reset" align="left">Владелец : {{ $moderatingList->gym->title }}</legend>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span
                                        class="">Основной телефон: </span>{{ $moderatingList->gym->phone_main }}</li>
                            <li class="list-group-item"><span
                                        class="">Дополнительный телефон:  </span>{{ $moderatingList->gym->phone_second }}</li>
                            <li class="list-group-item"><span
                                        class="">Электронная почта: </span>{{ $moderatingList->gym->email }}</li>
                            <li class="list-group-item"><span
                                        class="">Ссылка: </span>{{ $moderatingList->gym->url }}</li>
                            <li class="list-group-item"><span
                                        class="">Описание: </span>{{ $moderatingList->gym->description }}</li>
                        </ul>

                        {{--@if(collect($moderatingList->gym->addresses)->isNotEmpty())--}}
                            @forelse($moderatingList->gym->addresses as $key => $address)
                                <ul class="list-group list-group-flush">
                                    {{ $key + 1 }})
                                    <li class="list-group-item">
                                        <span class="">Индекс: </span>{{ $address->index }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="">Страна:  </span>{{ $address->country }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="">Город: </span>{{ $address->city }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="">Улица: </span>{{ $address->street }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="">Номер дома: </span>{{ $address->house_number }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="">Строение: </span>{{ $address->building }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="">Этаж: </span>{{ $address->floor }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="">Квартира: </span>{{ $address->apartment }}
                                    </li>
                                </ul>
                            @empty
                                Записей не найдено
                            @endforelse
                        {{--@endif--}}
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            {{--<div class="carousel-indicators">--}}
                                {{--<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>--}}
                                {{--<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>--}}
                                {{--<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>--}}
                            {{--</div>--}}
                            <div class="carousel-inner">
                                @forelse($moderatingList->gym->images as $key => $image)
                                    <div class="carousel-item @if($key === 0 ) active @endif">
                                        <img src="{{ Storage::disk('public')->url($image->image) }}" class="d-block w-100" alt="...">
                                    </div>
                                @empty
                                    <div class="carousel-item">
                                        Записей не найдено
                                    </div>
                                @endforelse
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </fieldset>
                </div>
            </div>
        @endif
        <form method="post" action="{{ route('admin.moderatings.update', ['moderating' => $moderatingList->id]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="reason">Причина</label>
                <select class="form-control" name="reason" id="reason">
                    @foreach ($reasons as $key => $reason)
                        <option @if ($reason === 0) selected @endif value="{{ $key }}">
                            {{ $reason }}
                        </option>
                    @endforeach
                </select>
            </div>
            <br>
            <button class="btn btn-success" type="submit" name="submit_key" value="IS_APPROVED">Одобрить</button>
            <button class="btn btn-danger" type="submit" name="submit_key" value="IS_REJECTED">Отклонить</button>
        </form>
    </div>
    <br>
@endsection
@push('js')
@endpush

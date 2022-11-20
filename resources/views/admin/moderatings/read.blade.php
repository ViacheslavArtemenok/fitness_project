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
        @if(isset($moderatingList->tags))
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

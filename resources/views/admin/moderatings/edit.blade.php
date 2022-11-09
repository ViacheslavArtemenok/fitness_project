@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <br>
        @include('inc.message')
        <h2>
            {{ $moderatingList[0]->profile->last_name }}
            {{ $moderatingList[0]->profile->first_name }}
            {{ $moderatingList[0]->profile->father_name }}
        </h2>
        <div class="container">
            <div class="row">
                <fieldset class="form-group border p-3 mb-4">
                    <legend class="w-auto px-3 reset" align="left">Пользователь</legend>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><span class="">Никнейм: </span>{{ $moderatingList[0]->name }}
                        </li>
                        <li class="list-group-item"><span class="">Электр. почта: </span>{{ $moderatingList[0]->email }}
                        </li>
                        <li class="list-group-item"><span class="">Телефон: </span> {{ $moderatingList[0]->phone }}
                        </li>
                    </ul>
                </fieldset>
            </div>
        </div>
        @if(isset($moderatingList[0]->profile))
            <div class="container">
                <div class="row">
                    <fieldset class="form-group border p-3 mb-4">
                        <legend class="w-auto px-3 reset" align="left">Профиль пользователя</legend>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span
                                        class="">Возраст: </span>{{ $moderatingList[0]->profile->age }}
                            </li>
                            <li class="list-group-item"><span
                                        class="">Пол: </span>{{ $moderatingList[0]->profile->gender }}
                            </li>
                            <li class="list-group-item"><span class="">Аватар: </span>
                                <div class="">
                                    @if(isset($moderatingList[0]->profile->image))
                                        <img class="market_image"
                                             src="{{ Storage::disk('public')->url($moderatingList[0]->profile->image) }}"
                                             alt="img" style="width: 100px">
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </fieldset>
                </div>
            </div>
        @endif
        @if(isset($moderatingList[0]->skill))
            <div class="container">
                <div class="row">
                    <fieldset class="form-group border p-3 mb-4">
                        <legend class="w-auto px-3 reset" align="left">Навыки</legend>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span
                                        class="">Расположение: </span>{{ $moderatingList[0]->skill->location }}</li>
                            <li class="list-group-item"><span
                                        class="">Образование:  </span>{{ $moderatingList[0]->skill->education }}</li>
                            <li class="list-group-item"><span
                                        class="">Опыт: </span>{{ $moderatingList[0]->skill->experience }}</li>
                            <li class="list-group-item"><span
                                        class="">Достижения: </span>{{ $moderatingList[0]->skill->achievements }}</li>
                            <li class="list-group-item"><span
                                        class="">Список навыков: </span>{{ $moderatingList[0]->skill->skills_list }}
                            </li>
                            <li class="list-group-item"><span
                                        class="">Описание: </span>{{ $moderatingList[0]->skill->description }}</li>
                        </ul>
                    </fieldset>
                </div>
            </div>
        @endif
        @if(isset($moderatingList[0]->tags))
            <div class="container">
                <div class="row">
                    <fieldset class="form-group border p-3 mb-4">
                        <legend class="w-auto px-3 reset" align="left">Тэги:</legend>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                @forelse($moderatingList[0]->tags as $tag)
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
        @if(isset($moderatingList[0]->characteristics))
            <div class="container">
                <div class="row">
                    <fieldset class="form-group border p-3 mb-4">
                        <legend class="w-auto px-3 reset" align="left">Навыки</legend>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span
                                        class="">Расположение: </span>{{ $moderatingList[0]->characteristics->location }}</li>
                            <li class="list-group-item"><span
                                        class="">Рост:  </span>{{ $moderatingList[0]->scharacteristics->height }}</li>
                            <li class="list-group-item"><span
                                        class="">Вес: </span>{{ $moderatingList[0]->characteristics->weight }}</li>
                            <li class="list-group-item"><span
                                        class="">Группа здоровья: </span>{{ $moderatingList[0]->characteristics->health }}</li>
                            <li class="list-group-item"><span
                                        class="">Описание: </span>{{ $moderatingList[0]->characteristics->descripton }}</li>
                        </ul>
                    </fieldset>
                </div>
            </div>
        @endif
        <form method="post" action="{{ route('admin.moderatings.update', ['moderating' => $moderatingList[0]]) }}">
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

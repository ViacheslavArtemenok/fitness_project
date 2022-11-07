@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <br>
        @include('inc.message')
        @php
           // dd($moderatingList[0]->tags);
        /*
        switch(request('submit_key')) {
    case 'block': // нажата кнопка Block
    break;
    case 'unlock': // нажата кнопка Unlock
    break;
    case 'del': // нажата кнопка Del
    break;
}
        */
        @endphp

        <h2>
            {{ $moderatingList[0]->profile->last_name }}
            {{ $moderatingList[0]->profile->first_name }}
            {{ $moderatingList[0]->profile->father_name }}
        </h2>

        <div class="jumbotron border rounded ">
            <div class="container">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Профиль пользователя:</li>
                    <li class="list-group-item"><span class="">Возраст </span>{{ $moderatingList[0]->profile->age }}</li>
                    <li class="list-group-item"><span class="">Пол </span>{{ $moderatingList[0]->profile->gender }}</li>
                    <li class="list-group-item"><span class="">Аватар </span>
                        <div class="">
                            @if(isset($moderatingList[0]->profile->image))
                                <img class="market_image" src="{{ Storage::disk('public')->url($moderatingList[0]->profile->image) }}" alt="img" style="width: 100px">
                            @endif
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <br>
        <div class="jumbotron border rounded ">
            <div class="container">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Навыки:</li>
                    <li class="list-group-item"><span class="">Расположение </span>{{ $moderatingList[0]->skill->location }}</li>
                    <li class="list-group-item"><span class="">Образование  </span>{{ $moderatingList[0]->skill->education }}</li>
                    <li class="list-group-item"><span class="">Опыт </span>{{ $moderatingList[0]->skill->experience }}</li>
                    <li class="list-group-item"><span class="">Достижения </span>{{ $moderatingList[0]->skill->achievements }}</li>
                    <li class="list-group-item"><span class="">Список навыков </span>{{ $moderatingList[0]->skill->skills_list }}</li>
                    <li class="list-group-item"><span class="">Описание </span>{{ $moderatingList[0]->skill->description }}</li>
                </ul>
            </div>
        </div>
        <br>
        <div class="jumbotron border rounded ">
            <div class="container">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Навыки:</li>
                    <li class="list-group-item"><span class="">Расположение </span>{{ $moderatingList[0]->skill->location }}</li>
                    <li class="list-group-item"><span class="">Образование  </span>{{ $moderatingList[0]->skill->education }}</li>
                    <li class="list-group-item"><span class="">Опыт </span>{{ $moderatingList[0]->skill->experience }}</li>
                    <li class="list-group-item"><span class="">Достижения </span>{{ $moderatingList[0]->skill->achievements }}</li>
                    <li class="list-group-item"><span class="">Список навыков </span>{{ $moderatingList[0]->skill->skills_list }}</li>
                    <li class="list-group-item"><span class="">Описание </span>{{ $moderatingList[0]->skill->description }}</li>
                </ul>
            </div>
        </div>
        <br>
        <div class="jumbotron border rounded ">
            <div class="container">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Тэги:</li>
                    <li class="list-group-item">
                        @forelse($moderatingList[0]->tags as $tag)
                            <span class="">{{ $tag['tag'] }}</span><br>
                        @empty
                            <span class="">Тэгов нет</span>
                        @endforelse
                    </li>
                </ul>
            </div>
        </div>
       <form method="post" action="">
           @csrf
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
           <button class="btn btn-success" type="submit" name="submit_key">Одобрить</button>
           <button class="btn btn-danger" type="submit" name="submit_key">Отклонить</button>
       </form>


    </div>
    <br>
@endsection
@push('js')
@endpush
@extends('layouts.main')
@section('title') Список тренеров @parent @endsection
@section('content')
<!-- TEAM -->
<section id="team">

    <div class="col-md-12 col-sm-12 header_space">
        <div class="section-title">
             <h2>{{$trainer->profile->first_name}} {{$trainer->profile->father_name}} {{$trainer->profile->last_name}} 
               <small>Город: {{$trainer->skill->location}}</small></h2>
        </div>
    </div>          

    <div class="col-md-5 col-sm-6">
     <div class="team-thumb">
          <a href="{{ route('trainers.show', ['id' => $trainer->id]) }}" class="team-image">
               <img src="{{ $trainer->profile->image }}" class="img-responsive" alt="img">
          </a>
          <div class="team-info">
               <h2>Контакты</h2>
               <h3>Телефон: {{$trainer->phone}}</h3>
               <h3>Email: {{$trainer->email}}</h3>
           </div>
          <ul class="social-icon">
               <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
               <li><a href="#" class="fa fa-twitter"></a></li>
               <li><a href="#" class="fa fa-instagram"></a></li>
          </ul>
     </div>
     </div>            
     <div class="col-md-5 col-sm-6">
          <div class="team-thumb">
          <div class="team-info">
          <h3>Возраст</h3>
          <p>{{$trainer->profile->age}} лет</p>
          <h3>Опыт</h3>
          <p>{{$trainer->skill->experience}} лет</p>
          <h3>Навыки</h3>
          <p>{{$trainer->skill->skills_list}}</p>
          <h3>Образование</h3>
          <p>{{$trainer->skill->education}}</p>
          <h3>Достижения</h3>
          <p>{{$trainer->skill->achievements}}</p>
          <h3>О себе</h3>
          <p>{{$trainer->skill->description}}</p>
          </div>
      </div>
     </div>      
        
</section>
@endsection
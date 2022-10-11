@extends('layouts.main')
@section('title') Список тренеров @parent @endsection
@section('content')
<!-- TEAM -->
<section id="team">
              <div class="col-md-12 col-sm-12 header_space">
                   <div class="section-title">
                        <h2>Все специалисты фитнес-индустрии<small>Выбери своего наставника</small></h2>
                   </div>
              </div>
               @forelse($trainersList as $key => $trainer) 
               <div class="col-md-3 col-sm-6">
                   <div class="team-thumb team-space">
                        <a href="{{ route('trainers.show', ['id' => $trainer->id]) }}" class="team-image">
                             <img src="{{ $trainer->profile->image }}" class="img-responsive" alt="img">
                        </a>
                        <div class="team-info">
                             <h5>{{$trainer->profile->first_name}} {{$trainer->profile->last_name}}</h5>
                             <h6>Возраст: {{$trainer->profile->age}} лет</h6>
                             <h6>Опыт: {{$trainer->skill->experience}} лет</h6>
                             <h6>Город: {{$trainer->skill->location}}</h6>
                             <span>{{$trainer->skill->skills_list}}</span>
                         </div>
                        <ul class="social-icon">
                             <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                             <li><a href="#" class="fa fa-twitter"></a></li>
                             <li><a href="#" class="fa fa-instagram"></a></li>
                        </ul>
                   </div>
               </div>
               @empty
    <h2>Записей нет</h2>
    @endforelse  
              
    {{ $trainersList->links() }}              
       </section>
@endsection
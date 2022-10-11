@extends('layouts.main')
@section('title') Список тренеров @parent @endsection
@section('content')
<!-- TEAM -->
<section id="team">

    <div class="col-md-12 col-sm-12 header_space">
        <div class="section-title">
             <h2>Fitness trainers <small>Meet Professional Trainers</small></h2>
        </div>
    </div>          

    <div class="col-md-3 col-sm-6">
        <div class="team-thumb">
             <div class="team-image">
                  <img src="assets/images/author-image1.jpg" class="img-responsive" alt="img">
             </div>
             <div class="team-info">
                  <h3>Mark Wilson</h3>
                  <span>I love Teaching</span>
             </div>
             <ul class="social-icon">
                  <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                  <li><a href="#" class="fa fa-twitter"></a></li>
                  <li><a href="#" class="fa fa-instagram"></a></li>
             </ul>
         </div>
     </div>            
              
        
</section>
@endsection
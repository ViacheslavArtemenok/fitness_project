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
                        <a href="{{ route('trainers.show', ['id' => 1]) }}" class="team-image">
                             <img src="assets/images/author-image1.jpg" class="img-responsive" alt="">
                        </a>
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
              
                <div class="col-md-3 col-sm-6">
                   <div class="team-thumb">
                        <div class="team-image">
                             <img src="assets/images/author-image2.jpg" class="img-responsive" alt="">
                        </div>
                        <div class="team-info">
                             <h3>Catherine</h3>
                             <span>Education is the key!</span>
                        </div>
                        <ul class="social-icon">
                             <li><a href="#" class="fa fa-google"></a></li>
                             <li><a href="#" class="fa fa-instagram"></a></li>
                        </ul>
                   </div>
              </div>
              
              <div class="col-md-3 col-sm-6">
                   <div class="team-thumb">
                        <div class="team-image">
                             <img src="assets/images/author-image3.jpg" class="img-responsive" alt="">
                        </div>
                        <div class="team-info">
                             <h3>Jessie Ca</h3>
                             <span>I like Online Courses</span>
                        </div>
                        <ul class="social-icon">
                             <li><a href="#" class="fa fa-twitter"></a></li>
                             <li><a href="#" class="fa fa-envelope-o"></a></li>
                             <li><a href="#" class="fa fa-linkedin"></a></li>
                        </ul>
                   </div>
              </div>

              <div class="col-md-3 col-sm-6">
                   <div class="team-thumb">
                        <div class="team-image">
                             <img src="assets/images/author-image4.jpg" class="img-responsive" alt="">
                        </div>
                        <div class="team-info">
                             <h3>Andrew Berti</h3>
                             <span>Learning is fun</span>
                        </div>
                        <ul class="social-icon">
                             <li><a href="#" class="fa fa-twitter"></a></li>
                             <li><a href="#" class="fa fa-google"></a></li>
                             <li><a href="#" class="fa fa-behance"></a></li>
                        </ul>
                   </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="team-thumb">
                     <div class="team-image">
                          <img src="assets/images/author-image1.jpg" class="img-responsive" alt="">
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
           
             <div class="col-md-3 col-sm-6">
                <div class="team-thumb">
                     <div class="team-image">
                          <img src="assets/images/author-image2.jpg" class="img-responsive" alt="">
                     </div>
                     <div class="team-info">
                          <h3>Catherine</h3>
                          <span>Education is the key!</span>
                     </div>
                     <ul class="social-icon">
                          <li><a href="#" class="fa fa-google"></a></li>
                          <li><a href="#" class="fa fa-instagram"></a></li>
                     </ul>
                </div>
           </div>
           
           <div class="col-md-3 col-sm-6">
                <div class="team-thumb">
                     <div class="team-image">
                          <img src="assets/images/author-image3.jpg" class="img-responsive" alt="">
                     </div>
                     <div class="team-info">
                          <h3>Jessie Ca</h3>
                          <span>I like Online Courses</span>
                     </div>
                     <ul class="social-icon">
                          <li><a href="#" class="fa fa-twitter"></a></li>
                          <li><a href="#" class="fa fa-envelope-o"></a></li>
                          <li><a href="#" class="fa fa-linkedin"></a></li>
                     </ul>
                </div>
           </div>

           <div class="col-md-3 col-sm-6">
                <div class="team-thumb">
                     <div class="team-image">
                          <img src="assets/images/author-image4.jpg" class="img-responsive" alt="">
                     </div>
                     <div class="team-info">
                          <h3>Andrew Berti</h3>
                          <span>Learning is fun</span>
                     </div>
                     <ul class="social-icon">
                          <li><a href="#" class="fa fa-twitter"></a></li>
                          <li><a href="#" class="fa fa-google"></a></li>
                          <li><a href="#" class="fa fa-behance"></a></li>
                     </ul>
                </div>
           </div>
       </section>
@endsection
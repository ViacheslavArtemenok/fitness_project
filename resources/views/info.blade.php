@extends('layouts.main') @section('title') Главная @parent @endsection @section('content')
 <!-- HOME -->
 <section id="home">
    <div class="row">

              <div class="owl-carousel owl-theme home-slider">
                   <div class="item item-first">
                        <div class="caption">
                             <div class="container">
                                  <div class="col-md-6 col-sm-12">
                                       <h1>Distance Learning Education Center</h1>
                                       <h3>Our online courses are designed to fit in your industry supporting all-round with latest technologies.</h3>
                                       <a href="#feature" class="section-btn btn btn-default smoothScroll">Discover more</a>
                                  </div>
                             </div>
                        </div>
                   </div>

                   <div class="item item-second">
                        <div class="caption">
                             <div class="container">
                                  <div class="col-md-6 col-sm-12">
                                       <h1>Start your journey with our practical courses</h1>
                                       <h3>Our online courses are built in partnership with technology leaders and are designed to meet industry demands.</h3>
                                       <a href="#courses" class="section-btn btn btn-default smoothScroll">Take a course</a>
                                  </div>
                             </div>
                        </div>
                   </div>

                   <div class="item item-third">
                        <div class="caption">
                             <div class="container">
                                  <div class="col-md-6 col-sm-12">
                                       <h1>Efficient Learning Methods</h1>
                                       <h3>Nam eget sapien vel nibh euismod vulputate in vel nibh. Quisque eu ex eu urna venenatis sollicitudin ut at libero. Visit <a href="https://plus.google.com/+templatemo" target="_parent">templatemo</a> page.</h3>
                                       <a href="#contact" class="section-btn btn btn-default smoothScroll">Let's chat</a>
                                  </div>
                             </div>
                        </div>
                   </div>
              </div>
    </div>
</section>

  <!-- ABOUT -->
  <section id="about">
    <div class="container">
         <div class="row">

              <div class="col-md-6 col-sm-12">
                   <div class="about-info">
                        <h2>Start your journey to a better life with online practical courses</h2>

                        <figure>
                             <span><i class="fa fa-users"></i></span>
                             <figcaption>
                                  <h3>Professional Trainers</h3>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
                             </figcaption>
                        </figure>

                        <figure>
                             <span><i class="fa fa-certificate"></i></span>
                             <figcaption>
                                  <h3>International Certifications</h3>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
                             </figcaption>
                        </figure>

                        <figure>
                             <span><i class="fa fa-bar-chart-o"></i></span>
                             <figcaption>
                                  <h3>Free for 3 months</h3>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
                             </figcaption>
                        </figure>
                   </div>
              </div>

              <div class="col-md-offset-1 col-md-4 col-sm-12">
                   <div class="entry-form">
                        <form action="#" method="post">
                             <h2>Signup today</h2>
                             <input type="text" name="full name" class="form-control" placeholder="Full name" required="">

                             <input type="email" name="email" class="form-control" placeholder="Your email address" required="">

                             <input type="password" name="password" class="form-control" placeholder="Your password" required="">

                             <button class="submit-btn form-control" id="form-submit">Get started</button>
                        </form>
                   </div>
              </div>

         </div>
    </div>
</section>
@endsection
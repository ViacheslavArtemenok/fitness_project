<header class="header_space">
     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
        <div class="container">

             <div class="navbar-header">
                  <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                       <span class="icon icon-bar"></span>
                       <span class="icon icon-bar"></span>
                       <span class="icon icon-bar"></span>
                  </button>

                  <!-- lOGO TEXT HERE -->
                  <a href="#" class="navbar-brand">Known</a>
             </div>

             <!-- MENU LINKS -->
             <div class="collapse navbar-collapse">
                  <ul class="nav navbar-nav navbar-nav-first">
                       <li><a href="{{ url('/') }}">Home</a></li>
                       <li><a href="{{ route('trainers.index') }}">Fitness trainers</a></li>
                  </ul>

                  <ul class="nav navbar-nav navbar-right">
                       <li><a href="#"><i class="fa fa-phone"></i> +65 2244 1100</a></li>
                  </ul>
             </div>

        </div>
   </section>
</header>
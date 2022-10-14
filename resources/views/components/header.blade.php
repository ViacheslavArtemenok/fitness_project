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

                 <!-- Right Side Of Navbar -->
                 <ul class="nav navbar-nav">
                    @auth 
                    <li><a href="{{ route('account') }}">Личный кабинет</a></li>
                    @endauth
                     <!-- Authentication Links -->
                     @guest
                         @if (Route::has('login'))
                             <li>
                                 <a href="{{ route('login') }}">{{ __('Вход') }}</a>
                             </li>
                         @endif

                         @if (Route::has('register'))
                             <li class="nav-item">
                                 <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                             </li>
                         @endif
                     @else
                         <li class="nav-item dropdown">
                             <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                 {{ Auth::user()->name }}
                             </a>

                             <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                 <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                 </a>

                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                     @csrf
                                 </form>
                             </div>
                         </li>
                     @endguest
                 </ul>
             </div>
        </div>
   </section>
</header>

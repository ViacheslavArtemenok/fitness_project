<header class="header_line">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand p-2 text-light link-success" href="{{ url('/') }}">AggFitness</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link @if (request()->routeIs('info')) active @endif" aria-current="page"
                            href="{{ route('info') }}">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (request()->routeIs('trainers.*')) active @endif"
                            href="{{ route('trainers.index', ['tag_id' => 0, 'city_id' => 0]) }}">Тренеры</a>
                    </li>
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link @if (request()->routeIs('login')) active @endif"
                                    href="{{ route('login') }}">{{ __('Вход') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link @if (request()->routeIs('register')) active @endif"
                                    href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end btn btn-outline-secondary border border-2 border-success bg-dark text-center"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-danger link-dark fw-semibold" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Выход') }}
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
    </nav>
</header>

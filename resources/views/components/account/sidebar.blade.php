<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ url('/') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Домой
                </a>
            </li>
            @if (Auth::user())
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" aria-current="page" href="">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Панель управления
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.users.*')) active @endif" href="">
                    <span data-feather="folder" class="align-text-bottom"></span>
                    Профиль
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.skills.*')) active @endif" href="">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Навыки и умения
                </a>
            </li>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    Выход
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Выйти') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            @endif
        </ul>
    </div>
</nav>



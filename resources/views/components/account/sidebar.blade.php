<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ url('/') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Домой
                </a>
            </li>

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
        </ul>
    </div>
</nav>



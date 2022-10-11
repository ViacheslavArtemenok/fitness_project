<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item nav-link">
                <h4>Здравствуйте, XXX!</h4>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" aria-current="page" href="{{ route('admin.index') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Панель управления
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.users.*')) active @endif" href="{{ route('admin.users.index') }}">
                    <span data-feather="folder" class="align-text-bottom"></span>
                    Пользователи
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.profiles.*')) active @endif" href="{{ route('admin.profiles.index') }}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Профили
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.skills.*')) active @endif" href="{{ route('admin.skills.index') }}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Навыки и умения
                </a>
            </li>
        </ul>
    </div>
</nav>

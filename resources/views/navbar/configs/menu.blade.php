<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav"
    aria-expanded="false">
</button>

@if (Request::is('admin/*') || Request::is('admin'))
    <div class="collapse navbar-collapse" id="nav">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <button class="btn dropdown-toggle no-caret" data-bs-toggle="dropdown" aria-expanded="false">
                    Project
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">test</a></li>
                    <li><a class="dropdown-item" href="#">test</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <button class="btn dropdown-toggle no-caret" data-bs-toggle="dropdown" aria-expanded="false">
                    Users
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">User Listing</a></li>
                    <li><a class="dropdown-item" href="#">Assign Project</a></li>
                    <li><a class="dropdown-item" href="#">Status</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <button class="btn dropdown-toggle no-caret" data-bs-toggle="dropdown" aria-expanded="false">
                    Profiles
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Process</a></li>
                    <li><a class="dropdown-item" href="#">Threat</a></li>
                    <li><a class="dropdown-item" href="#">Vulbnerabilty</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="d-flex">
        <div class="btn-group">
            <img src="#" class="rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                style="width: 40px; height: 40px; cursor: pointer; background-color: grey;">
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
        </div>
    </div>
@elseif (Request::is('user/*') || Request::is('user'))
    <div class="collapse navbar-collapse" id="nav">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <button class="btn dropdown-toggle no-caret" data-bs-toggle="dropdown" aria-expanded="false">
                    Test
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">test</a></li>
                    <li><a class="dropdown-item" href="#">test</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <button class="btn dropdown-toggle no-caret" data-bs-toggle="dropdown" aria-expanded="false">
                    Test
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Test</a></li>
                    <li><a class="dropdown-item" href="#">Test</a></li>
                    <li><a class="dropdown-item" href="#">Test</a></li>
                    <li><a class="dropdown-item" href="#">Test</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <button class="btn dropdown-toggle no-caret" data-bs-toggle="dropdown" aria-expanded="false">
                    Test
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Test</a></li>
                    <li><a class="dropdown-item" href="#">Test</a></li>
                    <li><a class="dropdown-item" href="#">Test</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="d-flex">
        <div class="btn-group">
            <img src="#" class="rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                style="width: 40px; height: 40px; cursor: pointer; background-color: grey;">
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
        </div>
    </div>
@else
    @if (Request::is('/') || Request::is(''))
        <div class="d-flex">
            <button class="btn btn-dark" onclick="window.location.href='/login'">Login</button>
            <button class="btn btn-dark" onclick="window.location.href='/register'">register</button>
        </div>
    @elseif (Request::is('login'))
        <button class="btn btn-dark" onclick="window.location.href='/register'">register</button>
    @else
        <button class="btn btn-dark" onclick="window.location.href='/login'">Login</button>
    @endif
@endif

<style>
    .no-caret::after {
        display: none !important;
    }
</style>

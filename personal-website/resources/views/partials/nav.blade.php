<nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
    <a class="navbar-brand font-weight-bold" href="{{ route('home') }}">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                <a class="nav-link font-weight-bold text-uppercase" href="{{ route('home') }}">home</a>
            </li>
            <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
                <a class="nav-link font-weight-bold text-uppercase" href="{{ route('about') }}">about</a>
            </li>
            <li class="nav-item {{ request()->routeIs('sample-post') ? 'active' : '' }}">
                <a class="nav-link font-weight-bold text-uppercase" href="{{ route('sample-post') }}">sample post</a>
            </li>
            <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                <a class="nav-link font-weight-bold text-uppercase" href="{{ route('contact') }}">contact</a>
            </li>
        </ul>
    </div>
</nav>

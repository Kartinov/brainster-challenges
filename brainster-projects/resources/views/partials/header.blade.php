<header class="bg-warning">
    <div class="container">

        {{-- navbar --}}
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('img/Logo.svg') }}" alt="Brainster Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav mx-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link" href="https://brainster.co/full-stack/" target="_blank">
                            Академја за<br>Програмирање</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://brainster.co/marketing/" target="_blank">
                            Академја за<br>Маркетиинг</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://brainster.co/graphic-design/" target="_blank">
                            Академја за<br>Дизајн</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://blog.brainster.co/">
                            Блог
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Вработи наши<br> студенти
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    @if (request()->routeIs('home'))
        {{-- header cover image --}}
        <div class="header-cover-image" style="background-image: url({{ asset('img/synthesio-0301.gif') }})">

            {{-- dark overlay --}}
            <div class="dark-overlay"></div>

            <div
                class="position-relative z-index-3 text-white h-100 d-flex flex-column text-center justify-content-center align-items-center">
                <h1>Brainster.xyz Labs</h1>
                <p class="mb-0">Проекти од академиите на Brainster</p>
            </div>
        </div>
    @endif
</header>

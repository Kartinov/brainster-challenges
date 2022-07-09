<header class="bg-warning">
    {{-- Navbar --}}
    @include('partials.nav')

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

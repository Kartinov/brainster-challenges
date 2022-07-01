<header class="bg-cover" style="background-image: url({{ $bgCover }})">
    <div class="dark-overlay"></div>
    <div class="container h-100">
        @include('partials.nav')

        <div class="row justify-content-center align-items-center h-75 text-white text-center">
            <div class="col-md-6">
                @yield('heading')
            </div>
        </div>
    </div>
</header>

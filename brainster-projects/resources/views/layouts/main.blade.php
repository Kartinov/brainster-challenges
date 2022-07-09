<!doctype html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>
    @include('partials.header')

    <div class="container">
        @yield('content')
    </div>

    @include('partials.footer')

    @include('partials.script')

    @yield('script')
</body>

</html>

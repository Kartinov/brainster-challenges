<!doctype html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>
    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    @include('partials.script')

    @yield('script')
</body>

</html>

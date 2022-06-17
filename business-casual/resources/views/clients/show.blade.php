<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Business Casual</title>

    {{-- Bootstrap CDN v4.6 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}" type="text/css">

</head>

<body>
    <div class="bg-cover">
        <header>
            {{-- Page Title / Logo --}}
            <h1 class="text-center py-4 py-lg-5 px-2">
                <a href="{{ route('home') }}" id="logo"
                    class="display-4 text-uppercase text-center font-weight-bold text-white shadow-text">business
                    casual</a>
            </h1>

            {{-- Navbar --}}
            <nav class="navbar navbar-expand-sm navbar-dark justify-content-center text-center">
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    @if (Session::has('user'))
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('clients.show') }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('clients.logout') }}">Log out</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('clients.create') }}">Log In</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </header>

        <main>
            <div class="container py-5">
                <div class="row">
                    <div class="col text-white">
                        <p>
                            Your firstname is: {{ Session::get('user.firstname') }}
                        </p>

                        <p>
                            Your lastname is: {{ Session::get('user.lastname') }}
                        </p>

                        @if (Session::has('user.email'))
                            <p>Your email is: {{ Session::get('user.email') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </main>
        {{-- Footer --}}
        <footer class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <p class="mb-0">Copyright &copy; Your Website 2022</p>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

</body>

</html>

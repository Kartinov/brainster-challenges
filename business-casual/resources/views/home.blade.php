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
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clients.create') }}">Log In</a>
                    </li>
                </ul>
            </nav>
        </header>

        <main class="pb-5">
            {{-- Hero Section --}}
            <section class="container py-5">
                <div class="row">
                    <div class="col-12 position-relative">
                        <div class="image-wrapper w-75 ml-auto">
                            <img src="{{ asset('images/cafee-store.jpg') }}" class="img-fluid rounded">
                        </div>
                        <div class="pop-up text-box text-center rounded p-3">
                            <h3 class="text-uppercase h6">lorem ipsum</h3>
                            <h2 class="text-uppercase h4 mb-3">lorem ipsum</h2>
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde voluptas,
                                error aperiam
                                voluptate non culpa magnam praesentium consectetur velit ipsa?</p>
                            <a href="#" class="btn">Visit us today</a>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Our offer section --}}
            <section id="our-offer">
                <div class="container py-5">
                    <div class="row">
                        <div class="col">
                            <div class="offer-box text-box text-center p-3">
                                <h3 class="text-uppercase h6">lorem ipsum</h3>
                                <h2 class="text-uppercase h4 mb-3">lorem ipsum</h2>
                                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta
                                    ratione praesentium perferendis nihil nemo. Harum, ad eum! Possimus ipsa modi atque
                                    et non maiores dolor soluta, eos harum, odit similique nam assumenda blanditiis
                                    rerum debitis magnam? Ipsum dignissimos deleniti non tempora voluptates minima,
                                    ducimus labore odio exercitationem fugit sunt unde dolorem perferendis omnis, vero
                                    eum, vitae rem.</p>
                                <a href="#" class="btn">Visit us today</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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

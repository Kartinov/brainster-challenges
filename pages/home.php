<?php

require_once __DIR__ . '/../autoload.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="<?= App::asset('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= App::asset('css/custom.css') ?>">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="<?= App::route('home') ?>">Vehicle Registration</a>
        <button type="button" class="btn btn-primary outline-none" data-toggle="modal" data-target="#loginModal">
            Login
        </button>
    </nav>

    <div class="container d-flex justify-content-center">
        <div class="search-wrapper bg-light mt-4 p-5">

            <!-- Form -->
            <form action="" method="POST">
                <label for="reg_num" class="d-block text-center mb-3">
                    <h1 class="display-4">Vehicle Registration</h1>
                    <p class="lead">Enter your registration number to check its validity</p>
                </label>
                <?php

                echo '<pre>';
                var_dump($_SESSION);
                echo '</pre>';

                ?>
                <div class="input-group shadow">
                    <input type="text" class="form-control p-4 outline-none" placeholder="Registration number" id="reg_num" name="reg_num" autocomplete="off">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary outline-none">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Login Modal -->
        <?php require_once __DIR__ . '/components/loginModal.php' ?>

        <script src="<?= App::asset('js/jquery-3.6.0.min.js') ?>"></script>
        <script src="<?= App::asset('js/popper.min.js') ?>"></script>
        <script src="<?= App::asset('js/bootstrap.min.js') ?>"></script>

        <script>
            <?php if (Session::has('message')) : ?>
                $('#loginModal').modal('show')
            <?php Session::remove('message');
            endif ?>
        </script>


</body>

</html>
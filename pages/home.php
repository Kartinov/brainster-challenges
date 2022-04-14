<?php require_once __DIR__ . '/../autoload.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?= asset('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="<?= route('home') ?>">Vehicle Registration</a>
        <a href="#" class="font-weight-bold letter-space">Login</a>
    </nav>

    <div class="container">
        <div class="jumbotron text-center">
            <h1 class="display-4">Vehicle Registration</h1>
            <p class="lead">Enter your registration number to check its validity</p>
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control w-50 mx-auto" autocomplete="off" placeholder="Registration number">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>




</body>

</html>
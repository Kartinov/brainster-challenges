<?php require_once __DIR__ . '/../../autoload.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Registration</title>

    <link rel="stylesheet" href="<?= App::asset('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= App::asset('css/custom.css') ?>">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="<?= App::route('home') ?>">Vehicle Registration</a>

        <div>
            <?php if (!Session::has('user')) : ?>
                <button type="button" class="btn btn-primary outline-none" data-toggle="modal" data-target="#loginModal">
                    Login
                </button>
            <?php else : ?>
                <a href="<?= App::route('admin_panel') ?>" class="btn btn-info mr-3 outline-none">Admin Panel</a>
                <a href="<?= App::route('logout') ?>" class="btn btn-primary outline-none">Logout</a>
            <?php endif ?>
        </div>

    </nav>
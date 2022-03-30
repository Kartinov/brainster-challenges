<?php require_once __DIR__ . "/../includes/partials/header.php" ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#services">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid bg-image bg-secondary text-center text-white hero-banner py-4" style="background-image: url(<?= asset('img/') ?>);">
    <div class="row h-100">
        <h1 class="col-6 offset-3">This is the Main Title</h1>
        <h2 class="col-6 offset-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas voluptatibus molestiae nemo!</h2>
    </div>
</div>

<?php require_once __DIR__ . "/../includes/partials/footer.php" ?>
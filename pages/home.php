<?php require_once __DIR__ . "/../partials/header.php" ?>

<div class="bg-image min-vh-100 d-flex justify-content-center align-items-center" style='background-image: url(<?= asset("img/bg-home.jpg") ?>)'>
    <div class="text-center last-mb-0">
        <h1>Create your very own webpage.</h1>
        <h2>All you need to do is fill up a form!</h2>
        <a href="<?= route("createWebsite") ?>" class='btn btn-lg btn-outline-dark'>Start</a>
    </div>
</div>

<?php require_once __DIR__ . "/../partials/footer.php" ?>
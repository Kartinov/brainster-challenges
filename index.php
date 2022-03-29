<?php require_once __DIR__ . "/includes/partials/header.php" ?>

<div style='background-image: url(<?= asset("img/bg-abstract.jpg") ?>)' class="bg-image d-flex justify-content-center align-items-center">
    <div class="text-center last-mb-0">
        <h1>Create your very own webpage.</h1>
        <h2>All you need to do is fill up a form!</h2>
        <a href="<?= route("form") ?>" class='btn btn-lg btn-outline-dark'>Start</a>
    </div>
</div>

<?php require_once __DIR__ . "/includes/partials/footer.php" ?>
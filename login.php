<?php
$title = "Login";
require __DIR__ . '/assets/partials/header.php';
?>

<main id="login" class="flex justify-content-center align-items-center cover">
    <form method="POST" action="" class="form">
        <div class="form-group flex">
            <label class="form-group-label" for="username"><i class="fa-solid fa-user"></i></label>
            <input class="form-group-input" type="text" name="username" id="username" value="" placeholder="Enter username">
        </div>
        <div class="form-group flex">
            <label class="form-group-label" for="password"><i class="fa-solid fa-key"></i></label>
            <input class="form-group-input" type="text" name="password" id="password" value="" placeholder="Enter password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-dark uppercase block">Log In</button>
        </div>
    </form>
</main>

<?php require __DIR__ . '/assets/partials/footer.php'; ?>
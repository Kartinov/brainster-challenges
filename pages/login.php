<?php

require_once __DIR__ . "/../autoload.php";

ban_get_usage();
guestsOnly();

$title      = "Sign Up";
$style_path = "../assets/css/main.css";

require_once __DIR__ . '/../partials/header.php';
?>

<main id="login" class="flex justify-content-center align-items-center cover">
    <form class="form fade-scale" method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-title">
            <h2>Login</h2>
        </div>
        <div class="form-body">
            <div class="form-group flex">
                <label class="form-label" for="username"><i class="fa-solid fa-user-plus icon"></i></label>
                <input class="form-input" type="text" name="username" id="username" value="" placeholder="Enter username">
            </div>
            <div class="form-group flex">
                <label class="form-label" for="password"><i class="fa-solid fa-key icon"></i></label>
                <input class="form-input" type="text" name="password" id="password" value="" placeholder="Enter password">
            </div>
            <!-- Form feedback block -->
            <div class="form-group form-feedback">
                <p class="text-error">error messages</p>
                <p class="text-info">error messages</p>
                <p class="text-success">error messages</p>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark uppercase">log in</button>
            </div>
        </div>
    </form>
</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>
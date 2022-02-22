<?php
$title = "Sign Up";
require __DIR__ . '/assets/partials/header.php';
?>

<main id="signup" class="flex justify-content-center align-items-center cover">
    <form method="POST" action="" class="form fade-scale">
        <div class="form-title">
            <h2>Register an account</h2>
        </div>
        <div class="form-body">
            <div class="form-group flex">
                <label class="form-label" for="username"><i class="fa-solid fa-user-plus"></i></label>
                <input class="form-input" type="text" name="username" id="username" value="" placeholder="Enter username">
            </div>
            <div class="form-group flex">
                <label class="form-label" for="password"><i class="fa-solid fa-key"></i></label>
                <input class="form-input" type="text" name="password" id="password" value="" placeholder="Enter password">
            </div>
            <!-- Errors block -->
            <div class="form-group form-errors">
                <p>Error message one</p>
                <p>Error message two</p>
                <p>Error message three</p>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark uppercase">sign up</button>
            </div>
        </div>
    </form>
</main>

<?php require __DIR__ . '/assets/partials/footer.php'; ?>
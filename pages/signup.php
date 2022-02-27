<?php

require_once __DIR__ . "/../autoload.php";

ban_get_usage();

$title      = "Sign Up";
$style_path = "../assets/css/main.css";

$feedback = [
    'errors'      => [],
    'soft_errors' => []
];

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    // Check if there is empty value submitted
    if (has_array_empty_value($_POST)) {
        // Store message in array
        $feedback['errors'][] = get_invalid_message('required');
    } else {
        $username = trim($_POST['username']);
        $email    = trim($_POST['email']);
        $password = trim($_POST['password']);
    }
}

echo '<pre>';
print_r($feedback);
echo '</pre>';

require_once __DIR__ . '/../partials/header.php';
?>

<main id="signup" class="flex justify-content-center align-items-center cover">
    <form class="form fade-scale" method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-title">
            <h2>Register an account</h2>
        </div>
        <div class="form-body">
            <div class="form-group flex">
                <label class="form-label" for="username"><i class="fa-solid fa-user-plus icon"></i></label>
                <input class="form-input" type="text" name="username" id="username" value="<?= old('username') ?>" placeholder="Enter username">
            </div>
            <div class="form-group flex">
                <label class="form-label" for="email"><i class="fa-solid fa-at icon"></i></label>
                <input class="form-input" type="text" name="email" id="email" value="<?= old('email') ?>" placeholder="Enter email">
            </div>
            <div class="form-group flex">
                <label class="form-label" for="password"><i class="fa-solid fa-key icon"></i></label>
                <input class="form-input" type="text" name="password" id="password" value="" placeholder="Enter password">
            </div>
            <!-- Form feedback block -->
            <div class="form-group form-feedback">
                <?php print_error_messages($feedback['errors']); ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark uppercase">sign up</button>
            </div>
        </div>
    </form>
</main>

<?php 
require __DIR__ . '/../partials/footer.php'; 

// Reset
$_POST = [];
$feedback = [];

?>
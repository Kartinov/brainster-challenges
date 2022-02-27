<?php

require_once __DIR__ . "/../autoload.php";

ban_get_usage();
guestsOnly();

$title      = "Login";
$style_path = "../assets/css/main.css";

$feedback = [
    'errors' => [],
];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Check if there is empty value submitted
    if (has_array_empty_value($_POST)) {
        // Store message in array
        $feedback['errors'][] = get_invalid_message('required');
    } else {
        $username = strtolower(trim($_POST['username']));
        $password = trim($_POST['password']);

        // check login combination
        if (!login_combination($username, $password, USERS_FILE)) {
            $feedback['errors']['wrong_combination'] = get_invalid_message('wrong_combination');
        } else {
            $_SESSION['user'] = $username;
            redirect(SERVER_APP_PATH . "/pages/dashboard.php");
        }
    }
}

require_once __DIR__ . '/../partials/header.php';
?>

<main id="login" class="flex justify-content-center align-items-center cover">
    <form class="form fade-scale" method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-title">
            <h2>Login</h2>
        </div>
        <div class="form-body">
            <div class="form-group flex">
                <label class="form-label" for="username"><i class="fa-solid fa-user icon"></i></label>
                <input class="form-input" type="text" name="username" id="username" value="" placeholder="Enter username" autocomplete="off">
            </div>
            <div class="form-group flex">
                <label class="form-label" for="password"><i class="fa-solid fa-key icon"></i></label>
                <input class="form-input" type="text" name="password" id="password" value="" placeholder="Enter password" autocomplete="off">
            </div>
            <!-- Form feedback block -->
            <div class="form-group form-feedback">
                <?php print_error_messages($feedback['errors'], 'text-error'); ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark uppercase">log in</button>
            </div>
        </div>
    </form>
</main>

<?php
require __DIR__ . '/../partials/footer.php';
// Reset
$_POST    = [];
$feedback = [];
?>
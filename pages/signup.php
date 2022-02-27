<?php

require_once __DIR__ . "/../autoload.php";

ban_get_usage();
guestsOnly();

$title      = "Create an account";
$style_path = "../assets/css/main.css";

$feedback = [
    'errors'      => [],
    'soft_errors' => [],
    'success'     => []
];

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    // Check if there is empty value submitted
    if (has_array_empty_value($_POST)) {
        // Store message in array
        $feedback['errors'][] = get_invalid_message('required');
    } else {
        $username = strtolower(trim($_POST['username']));
        $email    = strtolower(trim($_POST['email']));
        $password = trim($_POST['password']);

        // USERNAME VALIDATION
        if (!field_length($username, 3, 17)) {
            $feedback['errors']['username'] = get_invalid_message('username_length');
        } else if (!username_strength($username)) {
            $feedback['errors']['username'] = get_invalid_message('username_strength');
        } else if (!is_unique('username', $username, USERS_FILE)) {
            $feedback['soft_errors']['username'] = get_invalid_message('username_taken');
        } else {
            $feedback['success']['username'] = get_valid_message('username_valid');
        }

        // EMAIL VALIDATION
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $feedback['errors']['email'] = get_invalid_message('email_format');
        } else if (!email_strength($email)) {
            $feedback['errors']['email'] = get_invalid_message('email_strength');
        } else if (!is_unique('email', $email, USERS_FILE)) {
            $feedback['soft_errors']['email'] = get_invalid_message('email_taken');
        } else {
            $feedback['success']['email'] = get_valid_message('email_valid');
        }

        // PASSWORD VALIDATION
        if (!field_length($password, 5, 17)) {
            $feedback['errors']['password'] = get_invalid_message('password_length');
        } else if (!password_strength($password)) {
            $feedback['errors']['password'] = get_invalid_message('password_strength');
        }
    }

    if (
        empty($feedback['errors']) &&
        empty($feedback['soft_errors'])
    ) {
        $password   = password_hash($password, PASSWORD_BCRYPT);
        $registered = file_put_contents(USERS_FILE, "{$email},{$username}={$password}" . PHP_EOL, FILE_APPEND);

        if ($registered) {
            $_SESSION['user'] = $username;
            redirect(SERVER_APP_PATH . "/pages/dashboard.php");
        }
    }
}

require_once __DIR__ . '/../partials/header.php';
?>

<main id="signup" class="flex justify-content-center align-items-center cover">
    <form class="form fade-scale" method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-title">
            <h2>Create an account</h2>
        </div>
        <div class="form-body">
            <div class="form-group flex">
                <label class="form-label" for="username"><i class="fa-solid fa-user-plus icon"></i></label>
                <input class="form-input" type="text" name="username" id="username" value="<?= old('username') ?>" placeholder="Enter username" autocomplete="off">
            </div>
            <div class="form-group flex">
                <label class="form-label" for="email"><i class="fa-solid fa-at icon"></i></label>
                <input class="form-input" type="text" name="email" id="email" value="<?= old('email') ?>" placeholder="Enter email" autocomplete="off">
            </div>
            <div class="form-group flex">
                <label class="form-label" for="password"><i class="fa-solid fa-key icon"></i></label>
                <input class="form-input" type="text" name="password" id="password" value="" placeholder="Enter password" autocomplete="off">
            </div>
            <!-- Form feedback block -->
            <div class="form-group form-feedback">
                <?php print_error_messages($feedback['success'], 'text-success'); ?>
                <?php print_error_messages($feedback['soft_errors'], 'text-info'); ?>
                <?php print_error_messages($feedback['errors'], 'text-error'); ?>
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
$_POST    = [];
$feedback = [];

?>
<?php

/**
 * Ban any GET usage.
 */
function ban_get_usage(): void
{
    if (!empty($_GET)) {
        redirect(INDEX_PAGE);
    }
}

/**
 * Redirect if user is logged in
 */
function usersOnly()
{
    if (!isset($_SESSION['user'])) {
        redirect(INDEX_PAGE);
    }
}

/**
 * Redirect if user is not logged in
 */
function guestsOnly()
{
    if (isset($_SESSION['user'])) {
        redirect(SERVER_APP_PATH . "/pages/dashboard.php");
    }
}


/**
 * Checks if any array value is empty.
 * @param array $data
 * @return :bool if eny field of the array is empty
 */
function has_array_empty_value(array $data): bool
{
    foreach ($data as $value) {
        if (empty($value)) {
            return true;
            break;
        }
    }
    return false;
}

/**
 * Storage for invalid messages
 * @param string $key
 * @return string $key => $value as message
 */
function get_invalid_message(string $key): string
{
    $invalid_messages = [
        'required'          => 'All fields are required.',
        'username_length'   => 'Username need to be between 4 and 16 chars',
        'username_strength' => 'Username cannot contain empty spaces or special signs',
        'username_taken'    => 'A user with this username already exists',
        'email_format'      => 'Not valid email format',
        'email_strength'    => 'Email must have at least 5 characters before @',
        'email_taken'       => 'A user with this email already exists',
        'password_length'   => 'Password need to be between 6 and 16 chars',
        'password_strength' => 'Password must have at least one number, one special sign and one uppercase letter',
        'wrong_combination' => 'Wrong username/password combination '
    ];

    return $invalid_messages[$key];
}

function get_valid_message(string $key): string
{
    $valid_messages = [
        'username_valid' => 'Valid username',
        'email_valid'    => 'Valid email'
    ];

    return $valid_messages[$key];
}

/**
 * Print error messages
 */
function print_error_messages(array $errors, $color_class)
{
    foreach ($errors as $key => $message) {
        echo "<p class='$color_class'>{$message}</p>";
    }
}

/**
 * Return old value
 * @param string $key
 * @return string value
 */
function old(string $key): string
{
    return isset($_POST[$key]) ? $_POST[$key] : '';
}

function insertData($username, $pass, $email) //insert into users.txt
{
    file_put_contents('users.txt', "$email,$username,$pass\n", FILE_APPEND);
    return true;
}


/**
 * Redirect to given route
 * @param string $route
 * @return void
 */
function redirect(string $route): void
{
    header("Location:" . $route);
    die();
}

/**
 * Checks username strength
 * @param string $username
 * @return bool true if username meets the conditions 
 */
function username_strength(string $username): bool
{
    if ((preg_match("/^[a-zA-Z0-9]+$/", $username)) &&
        (!preg_match("/^[^ ].* .*[^ ]$/", $username))
    ) {
        return true;
    }
    return false;
}

/**
 * Checks email strength
 * @param string $email
 * @return bool true if email meets the conditions 
 */
function email_strength(string $email): bool
{
    $before = strstr($email, '@', true);
    return strlen($before) < 5 ? false : true;
}

/**
 * Checks password strength
 * @param string $password
 * @return bool true if password meets the conditions 
 */
function password_strength($password): bool
{
    if (
        !preg_match('/[a-z]+/', $password)
        || !preg_match('/[A-Z]+/', $password)
        || !preg_match('/[0-9]+/', $password)
        || !preg_match('/[!@#\$%\^&\*]+/', $password)
    ) {
        return false;
    }
    return true;
}

/**
 * Checks minimum length
 * @param string $field, int $min, int $max
 * @return bool
 */
function field_length(string $field, int $min, int $max): bool
{
    $field_length = strlen($field);
    return $field_length > $min && $field_length < $max ? true : false;
}

/**
 * Return all users if file exists, else return false
 * @param $file
 * @return array
 */
function get_users_data($file): array
{
    $all_users = explode(PHP_EOL, trim(file_get_contents($file)));

    $users_data = [];
    $i = 0;
    foreach ($all_users as $user) {
        $user_data         = explode(',', $user);
        $username_password = explode('=', $user_data[1]);
        // Data order in array
        $users_data[$i]['email']    = $user_data[0];
        $users_data[$i]['username'] = $username_password[0];
        $users_data[$i]['password'] = $username_password[1];
        $i++;
        /* It becomes like this:
        $users_data = [
            0 => 'email'    => 'any@email.com',
                 'username' => 'anyuser',
                 'password' => 'anyhashedpass',
        ] */
    }
    return $users_data;
}

/**
 * Check if $field_value is unique
 * @param string $field, $field_value, $file
 * @return bool
 */
function is_unique($field, $field_value, $file): bool
{
    // Get ordered data from users file
    $users_data = get_users_data($file);
    $unique = true;
    for ($i = 0; $i < count($users_data); $i++) {
        if ($field_value === $users_data[$i][$field]) {
            $unique = false;
            break;
        }
    }
    return $unique;
}

/**
 * Checks if $username and $password are valid combination to login
 * @param $username, $password, $file
 * @return bool
 */
function login_combination($username, $password, $file):bool
{
    $users_data = get_users_data($file);
    $match = false;
    for ($i = 0; $i < count($users_data); $i++) {
        if ($username !== $users_data[$i]['username']) {
            continue;
        }
        if (password_verify($password, $users_data[$i]['password'])) {
            $match = true;
            break;
        }
    }
    return $match;
}

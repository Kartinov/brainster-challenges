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
        'email_format'      => 'Not valid email format',
        'email_strength'    => 'Email must have at least 5 characters before @',
        'password_length'   => 'Password need to be between 6 and 16 chars',
        'password_strength' => 'Password must have at least one number, one special sign and one uppercase letter',
    ];

    return $invalid_messages[$key];
}

/**
 * Print error messages
 */
function print_error_messages(array $errors)
{
    foreach ($errors as $key => $message) {
        echo "<p class='text-error'>{$message}</p>";
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
    $fieldLength = strlen($field);
    return $fieldLength > $min && $fieldLength < $max ? true : false;
}

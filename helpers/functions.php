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
        'required' => 'All fields are required.',
    ];

    return $invalid_messages[$key];
}

/**
 * Print error messages
 */
function print_error_messages(array $errors)
{
    foreach ($errors as $messages) {
        echo "<p class='text-error'>{$messages}</p>";
    }
}

/**
 * Return old value
 */
function old(string $key): string {
    return isset($array[$key]) ?: $_SESSION['old'][$key];
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

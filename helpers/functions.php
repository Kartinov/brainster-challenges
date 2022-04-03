<?php

/**
 * To assets folder
 * 
 * @param string $location
 * 
 * @return string PATH to location in assets folder
 */
function asset($location): string
{
    $path = [APP_URL, "assets", $location];

    foreach ($path as $key => $part) {
        $path[$key] = trim($part, "/",);
    }

    return implode("/", $path);
}

/**
 * Redirect to specified route
 * 
 * @param $route Location of the file
 * 
 * @example Can use: redirectTo(route('filename')) filename must be from mapped routes
 * 
 * @return void
 */
function redirectTo(string $route): void
{
    header("Location: $route");
    die();
}

/**
 * Get route location
 * 
 * @param string $route
 * 
 * @return string PATH to specified $route
 */
function route($route, $id = null): string
{
    global $appRoutes; // Mapped routes from routes.php

    return str_replace("{ID}", $id, $appRoutes[$route]) ?? "";
}


/**
 * POST requests only
 */
function onlyPostAllowed(): void
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        redirectTo(route('home'));
    }
}

function putErrorMessage(bool $status, string $text): void
{
    $_SESSION['msg'] = [
        'status' => $status,
        'text'   => $text
    ];
}

function printErrorMessages()
{
    if (isset($_SESSION['msg'])) {
        if ($_SESSION['msg']['status'] == 1) {
            echo "<div class='alert alert-success'>{$_SESSION['msg']['text']}</div>";
        } else {
            echo "<div class='alert alert-danger'>{$_SESSION['msg']['text']}</div>";
        }
        unset($_SESSION['msg']);
    }
}

/**
 * The function takes the number of seconds as input and outputs text such as: 
 *      - 10 seconds 
 *      - 1 minute
 * 
 * @param int $since
 * 
 * @return string
 */
function time_since(int $since): string
{
    $chunks = array(
        array(60 * 60 * 24 * 365, 'year'),
        array(60 * 60 * 24 * 30, 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24, 'day'),
        array(60 * 60, 'hour'),
        array(60, 'minute'),
        array(1, 'second')
    );

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }

    $print = ($count == 1) ? '1 ' . $name : "$count {$name}s";
    return $print;
}

function old(string $value, $option = false): string
{
    return $_SESSION['old'][$value] ?? '';
}

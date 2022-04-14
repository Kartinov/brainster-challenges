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
 * POST requests only
 */
function onlyPostAllowed(): void
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        redirectTo(route('home'));
    }
}
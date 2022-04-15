<?php

namespace App;

class App
{
    /**
     * Get route location
     * 
     * @param string $route must be key from array(routes)
     * @return string PATH to specified $route
     */
    public static function route($route, $id = null): string
    {
        $appPath = trim(APP_PATH, "/") . "/";

        $routes = [
            'home' => $appPath . 'pages/home.php',
        ];

        return str_replace("{ID}", $id, $routes[$route]) ?? "";
    }

    /**
     * To assets folder
     * 
     * @param string $location
     * @return string PATH to location in assets folder
     */
    public static function asset($location): string
    {
        $path = [APP_PATH, "assets", $location];

        foreach ($path as $key => $part) {
            $path[$key] = trim($part, "/",);
        }

        return implode("/", $path);
    }

    /**
     * Redirect to specified route
     * 
     * @param $route Location of the file 
     * @example Can use: redirectTo(route('filename')) filename must be from array(routes)
     */
    public static function redirectTo(string $route): void
    {
        header("Location: $route");
        die();
    }

    /**
     * POST requests only
     */
    public static function onlyPostAllowed(): void
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            self::redirectTo(self::route('home'));
        }
    }
}

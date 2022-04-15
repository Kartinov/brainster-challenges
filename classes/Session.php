<?php

require_once __DIR__ . '/../interfaces/SessionInterface.php';

namespace App\Session;

use App\Interfaces\SessionInterface;

class SessionHandler implements SessionInterface
{
    public static function init()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    /**
     * @param string $key
     * @return mixed
     */
    public static function get(string $key)
    {
        self::init();

        if (self::has($key)) {
            return $_SESSION[$key];
        }

        return null;
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public static function set(string $key, mixed $value)
    {
        self::init();

        $_SESSION[$key] = $value;
    }

    public static function remove(string $key): void
    {
        self::init();

        if (self::has($key)) {
            unset($_SESSION[$key]);
        }
    }

    public static function clear(): void
    {
        session_unset();
    }

    public static function has(string $key): bool
    {
        self::init();

        return array_key_exists($key, $_SESSION);
    }
}

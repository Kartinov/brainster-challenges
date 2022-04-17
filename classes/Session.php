<?php

require_once __DIR__ . '/../interfaces/SessionInterface.php';

class Session implements SessionInterface
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

    public static function getAndForget(string $key)
    {
        self::init();

        if (self::has($key)) {
            $value = $_SESSION[$key];
            self::remove($key);

            return $value;
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

    public static function destroy(): void
    {
        self::init();

        session_destroy();
    }

    public static function has(string $key): bool
    {
        self::init();

        return array_key_exists($key, $_SESSION);
    }

    public static function registration(string $key)
    {
        self::init();

        if (self::has('registration')) {
            if (
                is_object($_SESSION['registration'])  &&
                property_exists($_SESSION['registration'], $key)
            ) {
                return $_SESSION['registration']->{$key};
            } else if (
                is_array($_SESSION['registration']) &&
                array_key_exists($key, $_SESSION['registration'])
            ) {
                return $_SESSION['registration'][$key];
            }
        }

        return null;
    }

    /**
     * Print alert message
     * 
     * @return void
     */
    public static function printAlertMessage(): void
    {
        if (self::has('message')) {
            if ($_SESSION['message']['status']) {
                echo "<div class='alert alert-success'>{$_SESSION['message']['text']}</div>";
            } else {
                echo "<div class='alert alert-danger'>{$_SESSION['message']['text']}</div>";
            }

            self::remove('message'); // remove variable from $_SESSION
        }
    }
}

<?php

interface SessionInterface
{
    /**
     * @param string $key
     * @return mixed
     */
    public static function get(string $key);

    /**
     * @param string $key
     * @param mixed $value
     */
    public static function set(string $key, mixed $value);

    public static function remove(string $key): void;

    public static function destroy(): void;

    public static function has(string $key): bool;
}

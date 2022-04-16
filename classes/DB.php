<?php

require_once __DIR__ . '/../config.php';

abstract class DB
{
    protected $connection;

    function __construct()
    {
        try {
            $this->connection = new PDO(
                sprintf("mysql:host=%s;dbname=%s", HOSTNAME, DB_NAME),
                DB_USERNAME,
                DB_PASSWORD,
                [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $th) {
            die('Connection failed.');
        }
    }
}

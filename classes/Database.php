<?php

namespace App;

use \PDO;
use PDOException;

class Database
{
    private static $instance = null;
    private $conn;

    private $host = HOSTNAME;
    private $user = DB_USERNAME;
    private $pass = DB_PASSWORD;
    private $name = DB_NAME;

    private function __construct()
    {
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->name,
                $this->user,
                $this->pass,
                [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $th) {
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

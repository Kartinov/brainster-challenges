<?php

require_once __DIR__ . '/../autoload.php';

try {
    $conn = new PDO(
        "mysql:host=" . HOSTNAME . ";dbname=" . DB_NAME,
        DB_USERNAME,
        DB_PASSWORD,
        [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    redirectTo(route('404'));
}

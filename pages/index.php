<?php
// Just for redirect if someone enters '/pages' in the URL
require_once __DIR__ . '/../autoload.php';
ban_get_usage();
redirect(SERVER_APP_PATH . "/pages/dashboard.php");
?>
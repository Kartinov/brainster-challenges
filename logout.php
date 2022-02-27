<?php
require_once __DIR__ . "/autoload.php";
session_start();
session_destroy();
redirect(INDEX_PAGE);

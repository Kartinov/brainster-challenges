<?php

$appUrl = trim(APP_URL, "/") . "/";

$appRoutes = [
    'home'            => $appUrl . "pages/home.php",
    'createWebsite'   => $appUrl . "pages/createWebsite.php",
    'storeWebsite'    => $appUrl . "actions/storeWebsite.php",
    'generateWebsite' => $appUrl . "pages/generateWebsite.php",
    '404'             => $appUrl . "pages/404.php",
];

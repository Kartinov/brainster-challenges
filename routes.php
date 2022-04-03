<?php

$appUrl = trim(APP_URL, "/") . "/";

$appRoutes = [
    'home'            => $appUrl . "pages/home.php",
    'createWebsite'   => $appUrl . "pages/createWebsite.php",
    'storeWebsite'    => $appUrl . "actions/storeWebsite.php",
    'company'         => $appUrl . "pages/company.php?id={ID}",
    '404'             => $appUrl . "pages/404.php",
    'demoFields'      => $appUrl . "actions/demoFields.php",
];

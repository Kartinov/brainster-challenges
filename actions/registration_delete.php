<?php

require_once __DIR__ . '/../classes/App.php';
require_once __DIR__ . '/../classes/Registration.php';
require_once __DIR__ . '/../classes/Session.php';

$registrationDeleted = (new Registration)->delete('id', $_GET['id']);

if ($registrationDeleted) {
    // Session message
}

App::redirectTo(App::route('admin_panel'));

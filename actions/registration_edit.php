<?php

require_once __DIR__ . '/../classes/App.php';
require_once __DIR__ . '/../classes/Session.php';
require_once __DIR__ . '/../classes/Registration.php';
require_once __DIR__ . '/../classes/User.php';

$registration = (new Registration)->where(['id' => $_GET['id']])->first();

if ($registration) {
    Session::set('registration', $registration);
    Session::set('process:update-registration', '1');
}

App::redirectTo(App::route('admin_panel'));
<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../classes/App.php';
require_once __DIR__ . '/../classes/Session.php';

Session::remove('registration');
Session::remove('process:update-registration');

App::redirectTo(App::route('admin_panel'));
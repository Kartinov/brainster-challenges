<?php

require_once __DIR__ . '/../classes/App.php';
require_once __DIR__ . '/../classes/Authenticator.php';

App::onlyPostAllowed();

if (!(new Authenticator)->login($_POST['username'], $_POST['password'])) {
    App::redirectTo(App::route('home'));
}

App::redirectTo(App::route('admin_panel'));

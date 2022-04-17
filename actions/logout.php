<?php

require_once __DIR__ . '/../autoload.php';

Session::remove('user');

App::redirectTo(App::route('home'));

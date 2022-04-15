<?php

use App\App;

require_once __DIR__ . '/autoload.php';

App::redirectTo(App::route('home'));

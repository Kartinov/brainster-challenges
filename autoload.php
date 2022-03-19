<?php

require_once __DIR__ . '/classes/MarketStall.php';
require_once __DIR__ . '/classes/Cart.php';

foreach (glob(__DIR__ . "/classes/products/*") as $filename) {
    require_once $filename;
}
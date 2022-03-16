<?php

require_once __DIR__ . '/classes/Product.php';
require_once __DIR__ . '/classes/MarketStall.php';

$orange  = new Product('Orange', 4, true);
$potato  = new Product('Potato', 5, true);
$almonds = new Product('Almonds', 2, false);
$apple   = new Product('Apple', 5, true);

$market = new MarketStall(['orange' => $orange, 'potato' => $potato, 'almonds' => $almonds]);

// $market->addProductToMarket(['apple' => $apple]);

echo '<pre>';
print_r($market->products);
echo '</pre>';
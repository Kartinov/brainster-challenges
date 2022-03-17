<?php

require_once __DIR__ . '/classes/Product.php';
require_once __DIR__ . '/classes/MarketStall.php';
require_once __DIR__ . '/classes/Cart.php';

$orange  = new Product('Orange', 4, true);
$potato  = new Product('Potato', 5, true);
$almonds = new Product('Almonds', 2, false);
$apple   = new Product('Apple', 5, true);
$banana  = new Product('Banana', 9, false);

$market = new MarketStall(['orange' => $orange, 'potato' => $potato, 'almonds' => $almonds]);

$market->addProductsToMarket(['apple' => $apple, 'banana' => $banana]);

$cart = new Cart();

$cart->addToCart($market->getItem('orange', 4));
// $cart->addToCart(['dimche']);

echo '<pre>';
print_r($cart->cartItems);
echo '</pre>';
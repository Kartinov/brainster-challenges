<?php

require_once __DIR__ . '/classes/Product.php';
require_once __DIR__ . '/classes/MarketStall.php';
require_once __DIR__ . '/classes/Cart.php';

$orange   = new Product('Orange', 35, true);
$potato   = new Product('Potato', 240, false);
$nuts     = new Product('Nuts', 850, true);
$kiwi     = new Product('Kiwi', 670, false);
$pepper   = new Product('Pepper', 330, true);
$rasberry = new Product('Rasberry', 555, false);

$market1 = new MarketStall(['orange' => $orange, 'potato' => $potato, 'nuts' => $nuts]);
$market2 = new MarketStall(['kiwi' => $kiwi, 'pepper' => $pepper, 'rasberry' => $rasberry]);

$cart = new Cart();

$cart->addToCart($market1->getItem('orange', 4));
$cart->addToCart($market2->getItem('pepper', 6));
$cart->addToCart($market1->getItem('nuts', 3));

$cart->printReceipt();

// echo '<pre>';
// print_r($market1);
// echo '</pre>';

// echo '<pre>';
// print_r($cart->cartItems);
// echo '</pre>';

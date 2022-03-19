<?php


require_once __DIR__ . '/autoload.php';

$orange   = new Orange(35, true);
$potato   = new Potato(240, false);
$almonds  = new Almonds(850, true);
$kiwi     = new Kiwi(670, false);
$pepper   = new Pepper(330, true);
$rasberry = new Rasberry(555, false);

$market1 = new MarketStall(['orange' => $orange, 'potato' => $potato, 'almonds' => $almonds]);
$market2 = new MarketStall(['kiwi' => $kiwi, 'pepper' => $pepper, 'rasberry' => $rasberry]);

$cart = new Cart();

$cart->addToCart($market1->getItem('orange', 4));
$cart->addToCart($market2->getItem('pepper', 6));
$cart->addToCart($market1->getItem('almonds', 3));

$cart->printReceipt();

// echo '<pre>';
// print_r($market1);
// echo '</pre>';

// echo '<pre>';
// print_r($cart->cartItems);
// echo '</pre>';

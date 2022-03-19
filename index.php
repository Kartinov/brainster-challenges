<?php

require_once __DIR__ . '/autoload.php';

$orange   = new Orange(35, true);
$potato   = new Potato(240, false);
$almonds  = new Almonds(850, true);
$kiwi     = new Kiwi(670, false);
$pepper   = new Pepper(330, true);
$rasberry = new Rasberry(555, false);
$pear     = new Pear(250, true);
$apple    = new Apple(300, true);

$market1 = new MarketStall(['orange' => $orange, 'potato' => $potato, 'almonds' => $almonds]);
$market2 = new MarketStall(['kiwi' => $kiwi, 'pepper' => $pepper, 'rasberry' => $rasberry]);

$market1->addProductsToMarket(['pear' => $pear]);
$market2->addProductsToMarket(['apple' => $apple]);

$cart = new Cart();

$cart->addToCart($market1->getItem('orange', 4));
$cart->addToCart($market2->getItem('pepper', 6));
$cart->addToCart($market2->getItem('kiwi', 2));
$cart->addToCart($market1->getItem('potato', 4));
$cart->addToCart($market1->getItem('pear', 1));
$cart->addToCart($market2->getItem('apple', 1));

$cart->removeItem('pepper');
// $cart->removeAll();

$cart->printReceipt();

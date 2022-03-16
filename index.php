<?php

require_once __DIR__ . '/classes/Product.php';

$product = new Product('Orange', 15, true);

echo $product->getPrice();
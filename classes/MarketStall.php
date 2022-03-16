<?php

class MarketStall
{
    public $products = [];

    public function __construct($products)
    {
        $this->addProductsToMarket($products);
    }

    public function addProductsToMarket(array $products)
    {
        if ($this->verifyProducts($products)) {
            $this->products = array_merge($this->products, $products);
            return 1;
        }
        return 0;
    }

    private function verifyProducts(array $array): bool
    {
        // + To check if all values are objects from Pruduct Class
        $verify = false;
        if (!array_is_list($array)) {
            $verify = true;
            foreach ($array as $key => $value) {
                if (strcasecmp($key, $value->getName())) {
                    $verify = false;
                    break;
                }
            }
        }
        return $verify;
    }
}

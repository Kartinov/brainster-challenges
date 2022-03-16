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
        $verify = false;

        if (!array_is_list($array)) {
            $verify = true;

            foreach ($array as $key => $value) {
                if ($value instanceof Product) {
                    if (strcasecmp($key, $value->getName())) {
                        $verify = false;
                        break;
                    }
                } else {
                    $verify = false;
                }
            }
        }

        return $verify;
    }

    public function getItem(string $product, int $amount)
    {
        if (!array_key_exists($product, $this->products)) {
            return 0;
        }

        return ['amount' => $amount, $product => $this->products[$product]];
    }
}

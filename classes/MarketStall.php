<?php

class MarketStall
{
    public $products = [];

    public function __construct($products)
    {
        $this->addProductsToMarket($products);
    }

    public function addProductsToMarket(array $products): bool
    {
        if ($this->verifyProducts($products)) {
            $this->products = array_merge($this->products, $products);
            return 1;
        }
        return 0;
    }

    private function verifyProducts(array $array): bool
    {
        if (array_is_list($array)) return 0;

        foreach ($array as $key => $value) {
            // Check if $value has Class Product as one of its parents
            if (!is_a($value, 'Product')) return 0;

            // Check if $key has the same name with Product Name 
            if (strcasecmp($key, $value->getName())) return 0;
        }
        return 1;
    }

    public function getItem(string $product, int $amount): array
    {
        if (array_key_exists($product, $this->products)) {
            return ['amount' => $amount, 'product' => $this->products[$product]];
        }
        return [];
    }
}

<?php

class MarketStall
{
    private $products = [];

    public function __construct($products)
    {
        $this->addProductsToMarket($products);
    }

    /**
     * Adds product/s to Market
     * @param array $products
     * @return void
     */
    public function addProductsToMarket(array $products): void
    {
        if ($this->verifyMarketProducts($products)) {
            $this->products = array_merge($this->products, $products);
        }
    }

    /**
     * Verifies array keys and values
     * @param araay $array
     * @return bool
     */
    private function verifyMarketProducts(array $array): bool
    {
        foreach ($array as $key => $object) {
            if (
                !is_string($key)          ||
                !is_a($object, 'Product') ||
                strcasecmp($key, $object->getName())
            ) {
                return 0;
            }
        }
        return 1;
    }

    /**
     * @param string $product
     * @param int $amount
     * @return array
     */
    public function getItem(string $product, int $amount): array
    {
        return array_key_exists($product, $this->products)
            ? ['amount'  => $amount, 'product' => $this->products[$product]]
            : [];
    }
}

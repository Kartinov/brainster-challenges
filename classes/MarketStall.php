<?php
class MarketStall
{
    private $products = [];

    public function __construct($products)
    {
        $this->addProductsToMarket($products);
    }

    public function addProductsToMarket(array $products)
    {
        !$this->verifyMarketProducts($products) ?:
            $this->products = array_merge($this->products, $products);
    }

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

    public function getItem(string $product, int $amount): array
    {
        return
            array_key_exists($product, $this->products) ?
            [
                'amount'  => $amount,
                'product' => $this->products[$product]
            ]
            : [];
    }
}

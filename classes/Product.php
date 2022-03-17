<?php

class Product
{
    private $name;
    private $price;
    private $sellingByKg;

    public function __construct($name, $price, $sellingByKg)
    {
        $this->setName($name)->setPrice($price)->setSellingByKg($sellingByKg);
    }

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return strtolower($this->name);
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setSellingByKg(bool $sellingByKg)
    {
        $this->sellingByKg = $sellingByKg;
        return $this;
    }

    public function sellingBy(): string
    {
        return $this->sellingByKg ? 'kgs' : 'gunny sacks';
    }
}

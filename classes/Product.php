<?php

abstract class Product
{
    private $name;

    public function __construct($price, $sellingByKg)
    {
        $this->setName()
            ->setPrice($price)
            ->setSellingByKg($sellingByKg);
    }

    /**
     * Name of the product is based on the Class Name
     */
    public function setName()
    {
        $this->name = lcfirst(get_class($this));
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
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

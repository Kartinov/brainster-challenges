<?php
abstract class Product
{
    private $name;

    public function __construct($price, $sellingByKg)
    {
        $this->setName(get_class($this))
            ->setPrice($price)
            ->setSellingByKg($sellingByKg);
    }

    public function setName($name)
    {
        $this->name = lcfirst($name);
        return $this;
    }

    public function getName()
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

<?php

class Cart
{
    public $cartItems = [];

    public function addToCart(array $array)
    {
        $this->cartItems = array_merge($this->cartItems, $array);
    }
}

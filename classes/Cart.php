<?php
class Cart
{
    public $cartItems = [];

    public function addToCart(array $array)
    {
        $this->cartItems[] = $array;

        // With products name keys
        // $this->cartItems[$array['product']->getName()] = $array;
    }

    public function printReceipt()
    {
        if (empty($this->cartItems)) {
            echo 'Your cart is empty';
            return 0;
        }

        $finalPrice = 0;
        for ($i = 0; $i < count($this->cartItems); $i++) {
            $item   = $this->cartItems[$i];
            $name   = ucfirst($item['product']->getName());
            $amount = $item['amount'] . ' ' . $item['product']->sellingBy();
            $total  = floatval($amount) * $item['product']->getPrice();

            echo "<div>
                    {$name} | {$amount} | total = {$total} denars
                  </div>";

            $finalPrice += $total;
        }
        echo "Final price amount: {$finalPrice} denars";
    }
}

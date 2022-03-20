<?php

class Cart
{
    public $cartItems = [];

    public function addToCart(array $array)
    {
        $this->cartItems[$array['product']->getName()] = $array;
    }

    /**
     * Removes already saved item in Cart
     * @param string $item
     * @return void
     */
    public function removeItem(string $item): void
    {
        if (array_key_exists($item, $this->cartItems)) {
            unset($this->cartItems[$item]);
        } else {
            echo "This {$item} does not exist in your cart.";
        }
    }

    /**
     * Removes all saved items in Cart
     * @return void
     */
    public function removeAll(): void
    {
        $this->cartItems = [];
    }

    /**
     * Prints saved Products in Cart
     * @return void
     */
    public function printReceipt(): void
    {
        $receipt = $this->getReceiptData();

        if (!empty($receipt)) {
            foreach ($receipt['receiptItems'] as $item) {
                echo "<div>
                       {$item['productName']} | 
                       {$item['amount']} | 
                       total = {$item['toPay']} denars
                   </div>";
            }
            echo "Final price amount: {$receipt['totalToPay']} denars";
        } else {
            echo 'Your cart is empty';
        }
    }

    /**
     * Receipt Data
     * @return array
     */
    private function getReceiptData(): array
    {
        if (empty($this->cartItems)) return [];

        $receiptItems = [];
        $total = 0;

        foreach ($this->cartItems as $item) {
            $toPay  = $item['amount'] * $item['product']->getPrice();

            $receiptItems[] = [
                'productName' => ucfirst($item['product']->getName()),
                'amount'      => "{$item['amount']} {$item['product']->sellingBy()}",
                'toPay'       => $toPay,
            ];

            $total += $toPay;
        }

        $receiptData = [
            'receiptItems' => $receiptItems,
            'totalToPay'   => $total
        ];

        return $receiptData;
    }
}

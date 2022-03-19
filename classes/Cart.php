<?php

class Cart
{
    public $cartItems = [];

    public function addToCart(array $array)
    {
        $this->cartItems[$array['product']->getName()] = $array;
    }

    public function removeItem(string $item) {
        if (array_key_exists($item, $this->cartItems)) {
            unset($this->cartItems[$item]);
        } else {
            echo "This {$item} does not exist in your cart.";
        }
    }

    public function removeAll() {
        $this->cartItems = [];
    }

    public function printReceipt()
    {
        $receipt = $this->getReceiptData();

        if (!$receipt) {
            echo 'Your cart is empty';
            return 0;
        }

        foreach ($receipt['receiptItems'] as $item) {
            echo "<div>
                       {$item['productName']} | 
                       {$item['amount']} | 
                       total = {$item['toPay']} denars
                   </div>";
        }

        echo "Final price amount: {$receipt['totalToPay']} denars";
    }

    private function getReceiptData(): bool|array
    {
        if (empty($this->cartItems)) return 0;

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

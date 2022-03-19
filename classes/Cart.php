<?php

class Cart
{
    private $cartItems = [];

    public function addToCart(array $array)
    {
        $this->cartItems[] = $array;
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

<?php

namespace App\Payments;

class BankTransfer implements PaymentInterface
{
    private $currency;
    private $discount;

    public function __construct($currency) {
        $this->currency = $currency;
        $this->discount = 0;
    }

    public function setDiscount($amount) {
        $this->discount = $amount;
    }

    public function charge($amount) {
        return [
            'type' => 'Bank transfer',
            'currency' => $this->currency,
            'amount' => $amount - $this->discount,
            'discount' => $this->discount
        ];
    }

}

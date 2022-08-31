<?php

namespace App\Payments;

class CreditTransfer implements PaymentInterface
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
            'type' => 'Credit card',
            'amount' => $amount + $amount * 0.01 - $this->discount,
            'currnecy' => $this->currency,
            'discount' => $this->discount,
            'fee' => 0.01
        ];
    }

}

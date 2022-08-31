<?php

namespace App\Payments;

interface PaymentInterface
{
    public function setDiscount($amount);
    public function charge($amount);
}

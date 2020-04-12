<?php

namespace Mitosis\Checkout\Contracts;

use Mitosis\Contracts\Address;
use Mitosis\Contracts\Billpayer;

interface CheckoutDataFactory
{
    public function createBillpayer(): Billpayer;

    public function createShippingAddress(): Address;
}

<?php


namespace Mitosis\Checkout\Tests\Example;

use Mitosis\Checkout\Contracts\CheckoutDataFactory;
use Mitosis\Checkout\Tests\Example\Address as MockAddress;
use Mitosis\Contracts\Address;
use Mitosis\Contracts\Billpayer;

class DataFactory implements CheckoutDataFactory
{
    public function createBillPayer(): Billpayer
    {
        return new \Mitosis\Checkout\Tests\Example\Billpayer();
    }

    public function createShippingAddress(): Address
    {
        return new MockAddress();
    }
}

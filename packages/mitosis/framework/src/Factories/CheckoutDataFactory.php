<?php


namespace Mitosis\Framework\Factories;

use Konekt\Address\Contracts\Address as AddressContract;
use Konekt\Address\Models\AddressType;
use Mitosis\Checkout\Contracts\CheckoutDataFactory as CheckoutDataFactoryContract;
use Mitosis\Contracts\Address;
use Mitosis\Contracts\Billpayer;
use Mitosis\Order\Contracts\Billpayer as BillpayerContract;

class CheckoutDataFactory implements CheckoutDataFactoryContract
{
    public function createBillpayer(): Billpayer
    {
        $billpayer = app(BillpayerContract::class);

        $address       = app(AddressContract::class);
        $address->type = AddressType::BILLING;

        $billpayer->address()->associate($address);

        return $billpayer;
    }

    public function createShippingAddress(): Address
    {
        $address       = app(AddressContract::class);
        $address->type = AddressType::SHIPPING;

        return $address;
    }
}

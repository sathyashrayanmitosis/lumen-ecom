<?php


namespace Mitosis\Order\Tests\Dummies;

use Konekt\Address\Models\Address as BaseAddress;
use Mitosis\Support\Traits\AddressModel;

class Address extends BaseAddress implements \Mitosis\Contracts\Address
{
    use AddressModel;

    protected $guarded = ['id'];
}

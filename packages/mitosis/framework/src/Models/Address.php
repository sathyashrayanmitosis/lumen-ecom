<?php


namespace Mitosis\Framework\Models;

use Konekt\AppShell\Models\Address as BaseAddress;
use Mitosis\Contracts\Address as AddressContract;
use Mitosis\Support\Traits\AddressModel;

class Address extends BaseAddress implements AddressContract
{
    use AddressModel;
}

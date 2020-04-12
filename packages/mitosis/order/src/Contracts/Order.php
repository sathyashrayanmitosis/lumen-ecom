<?php

namespace Mitosis\Order\Contracts;

use Traversable;
use Mitosis\Contracts\Address;
use Mitosis\Contracts\BillPayer;

interface Order
{
    /**
     * Returns the number of the order
     *
     * @return string
     */
    public function getNumber();

    public function getStatus(): OrderStatus;

    /**
     * @return BillPayer|null
     */
    public function getBillpayer();

    /**
     * @return Address|null
     */
    public function getShippingAddress();

    public function getItems(): Traversable;

    /**
     * Returns the final total of the Order
     *
     * @return float
     */
    public function total();
}

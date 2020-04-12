<?php


namespace Mitosis\Order\Contracts;

interface OrderAwareEvent
{
    /**
     * @return Order
     */
    public function getOrder();
}

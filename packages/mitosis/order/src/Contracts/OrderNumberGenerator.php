<?php


namespace Mitosis\Order\Contracts;

interface OrderNumberGenerator
{
    /**
     * Generates and returns a new order number.
     *
     * @param Order|null $order
     *
     * @return string
     */
    public function generateNumber(Order $order = null);
}

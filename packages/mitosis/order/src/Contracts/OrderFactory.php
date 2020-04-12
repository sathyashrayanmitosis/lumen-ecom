<?php


namespace Mitosis\Order\Contracts;

interface OrderFactory
{
    /**
     * Creates a new order from simple data arrays
     *
     * @param array $data
     * @param array $items
     *
     * @return Order
     */
    public function createFromDataArray(array $data, array $items) : Order;
}

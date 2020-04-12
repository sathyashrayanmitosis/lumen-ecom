<?php


namespace Mitosis\Order\Events;

use Mitosis\Order\Contracts\Order;

trait HasOrder
{
    /** @var  Order */
    protected $order;

    /**
     * @return Order
     */
    public function getOrder(): Order
    {
        return $this->order;
    }
}

<?php


namespace Mitosis\Order\Events;

use Mitosis\Order\Contracts\Order;
use Mitosis\Order\Contracts\OrderAwareEvent;

abstract class BaseOrderEvent implements OrderAwareEvent
{
    use HasOrder;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }
}

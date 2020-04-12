<?php


namespace Mitosis\Framework\Listeners;

use Mitosis\Contracts\Buyable;
use Mitosis\Order\Contracts\OrderAwareEvent;
use Mitosis\Order\Contracts\OrderItem;

class UpdateSalesFigures
{
    public function handle(OrderAwareEvent $event)
    {
        $order = $event->getOrder();

        foreach ($order->getItems() as $item) {
            /** @var OrderItem $item */
            if ($item->product instanceof Buyable) {
                if ($item->quantity >= 0) {
                    $item->product->addSale($order->created_at, $item->quantity);
                } else {
                    $item->product->removeSale(-1 * $item->quantity);
                }
            }
        }
    }
}

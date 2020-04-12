<?php


namespace Mitosis\Framework\Factories;

use Mitosis\Checkout\Contracts\Checkout;
use Mitosis\Contracts\CheckoutSubject;
use Mitosis\Order\Factories\OrderFactory as BaseOrderFactory;

class OrderFactory extends BaseOrderFactory
{
    public function createFromCheckout(Checkout $checkout)
    {
        $orderData = [
            'billpayer'       => $checkout->getBillpayer()->toArray(),
            'shippingAddress' => $checkout->getShippingAddress()->toArray()
        ];

        $items = $this->convertCartItemsToDataArray($checkout->getCart());

        return $this->createFromDataArray($orderData, $items);
    }

    protected function convertCartItemsToDataArray(CheckoutSubject $cart)
    {
        return $cart->getItems()->map(function ($item) {
            return [
                'product'  => $item->getBuyable(),
                'quantity' => $item->getQuantity()
            ];
        })->all();
    }
}

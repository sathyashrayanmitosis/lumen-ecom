<?php


namespace Mitosis\Checkout\Traits;

use Mitosis\Contracts\CheckoutSubject;

trait HasCart
{
    /** @var  CheckoutSubject */
    protected $cart;

    /**
     * Returns the cart
     *
     * @return CheckoutSubject|null
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * Set the cart for the checkout
     *
     * @param CheckoutSubject $cart
     */
    public function setCart(CheckoutSubject $cart)
    {
        $this->cart = $cart;
    }
}

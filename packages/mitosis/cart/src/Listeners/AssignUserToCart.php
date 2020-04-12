<?php

namespace Mitosis\Cart\Listeners;

use Mitosis\Cart\Facades\Cart;

class AssignUserToCart
{
    /**
     * Assign a user to the cart
     *
     * @param $event
     */
    public function handle($event)
    {
        if (config('mitosis.cart.auto_assign_user')) {
            if (Cart::getUser() && Cart::getUser()->id == $event->user->id) {
                return; // Don't associate to the same user again
            }
            Cart::setUser($event->user);
        }
    }
}

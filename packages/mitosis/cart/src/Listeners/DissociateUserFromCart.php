<?php

namespace Mitosis\Cart\Listeners;

use Mitosis\Cart\Facades\Cart;

class DissociateUserFromCart
{
    public function handle($event)
    {
        if (config('mitosis.cart.auto_assign_user') && !config('mitosis.cart.preserve_for_user')) {
            if (null !== Cart::getUser()) { // Prevent from surplus db operations
                Cart::removeUser();
            }
        }
    }
}

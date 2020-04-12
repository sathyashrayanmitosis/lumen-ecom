<?php


namespace Mitosis\Cart\Listeners;

use Illuminate\Support\Facades\Auth;
use Mitosis\Cart\Facades\Cart;

class RestoreCurrentUsersLastActiveCart
{
    public function handle($event)
    {
        if (config('mitosis.cart.preserve_for_user') && Auth::check()) {
            if (Cart::isEmpty()) {
                Cart::restoreLastActiveCart(Auth::user());
            } elseif (config('mitosis.cart.merge_duplicates')) {
                Cart::mergeLastActiveCartWithSessionCart(Auth::user());
            }
        }
    }
}

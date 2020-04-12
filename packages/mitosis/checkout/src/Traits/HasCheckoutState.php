<?php


namespace Mitosis\Checkout\Traits;

use Mitosis\Checkout\Contracts\CheckoutState;
use Mitosis\Checkout\Models\CheckoutStateProxy;

trait HasCheckoutState
{
    public function getState(): CheckoutState
    {
        return $this->state instanceof CheckoutState ? $this->state : CheckoutStateProxy::create($this->state);
    }

    public function setState($state)
    {
        $this->state = $state instanceof CheckoutState ? $state : CheckoutStateProxy::create($state);
    }
}

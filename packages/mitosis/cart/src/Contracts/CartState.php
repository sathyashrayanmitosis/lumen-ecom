<?php


namespace Mitosis\Cart\Contracts;

interface CartState
{
    /**
     * Returns whether the cart's state represents an active state
     *
     * @return bool
     */
    public function isActive(): bool;

    /**
     * Returns the array of active states
     *
     * @return array
     */
    public static function getActiveStates(): array;
}

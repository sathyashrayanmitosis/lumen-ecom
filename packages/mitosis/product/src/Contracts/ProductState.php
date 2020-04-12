<?php



namespace Mitosis\Product\Contracts;

interface ProductState
{
    /**
     * Returns whether the state represents an active state
     *
     * @return boolean
     */
    public function isActive();

    /**
     * Returns an array of states that represent an active product state
     *
     * @return array
     */
    public static function getActiveStates();
}

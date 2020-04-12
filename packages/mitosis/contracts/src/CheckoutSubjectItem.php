<?php


namespace Mitosis\Contracts;

interface CheckoutSubjectItem
{
    /**
     * Returns the buyable (product) of the item
     *
     * @return Buyable
     */
    public function getBuyable(): Buyable;

    /**
     * Returns the quantity of the line
     *
     * @return integer
     */
    public function getQuantity();

    /**
     * Returns the (adjusted) line total
     *
     * @return float
     */
    public function total();
}

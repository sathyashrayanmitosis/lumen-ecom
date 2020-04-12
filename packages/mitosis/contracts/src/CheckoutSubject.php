<?php


namespace Mitosis\Contracts;

use Illuminate\Support\Collection;

/**
 * This one is typically a (readonly) cart
 */
interface CheckoutSubject
{
    /**
     * Returns a collection of CheckoutSubjectItems
     *
     * @return Collection
     */
    public function getItems(): Collection;

    /**
     * Returns the final total of the CheckoutSubject (typically a cart)
     *
     * @return float
     */
    public function total();
}

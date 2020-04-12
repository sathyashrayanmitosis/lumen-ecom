<?php


namespace Mitosis\Contracts;

/**
 * A customer (either company or individual person) that
 * receives an Invoice
 */
interface Billpayer extends Customer
{
    /**
     * Returns whether the customer is registered in the EU
     *
     * @return bool
     */
    public function isEuRegistered();

    /**
     * Returns the billing address
     *
     * @return Address
     */
    public function getBillingAddress() : Address;
}

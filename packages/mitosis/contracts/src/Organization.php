<?php


namespace Mitosis\Contracts;

interface Organization extends Contactable
{
    /**
     * Returns the Company name
     *
     * @return string|null
     */
    public function getCompanyName();

    /**
     * Customer's tax number (VAT id, tax id, etc)
     *
     * @return string|null
     */
    public function getTaxNumber();

}

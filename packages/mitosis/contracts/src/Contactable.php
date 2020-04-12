<?php


namespace Mitosis\Contracts;

interface Contactable
{
    /**
     * The contact's email address
     *
     * @return string|null
     */
    public function getEmail();

    /**
     * The contact's phone number
     *
     * @return string|null
     */
    public function getPhone();
}

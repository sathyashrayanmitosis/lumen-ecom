<?php


namespace Mitosis\Contracts;

interface Customer extends Organization, Person
{
    /**
     * Returns the name of the customer (either company or person's name)
     *
     * @return string
     */
    public function getName();

    /**
     * Returns whether the client is an organization (company, GO, NGO, foundation, etc)
     *
     * @return bool
     */
    public function isOrganization();

    /**
     * Returns whether the client is a natural person
     *
     * @return bool
     */
    public function isIndividual();
}

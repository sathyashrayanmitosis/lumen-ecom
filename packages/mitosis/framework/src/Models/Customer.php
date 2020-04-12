<?php


namespace Mitosis\Framework\Models;

use Konekt\Customer\Models\Customer as BaseCustomer;
use Mitosis\Contracts\Customer as CustomerContract;

class Customer extends BaseCustomer implements CustomerContract
{
    /**
     * @inheritDoc
     */
    public function getFirstName()
    {
        return $this->firstname;
    }

    /**
     * @inheritDoc
     */
    public function getLastName()
    {
        return $this->lastname;
    }

    /**
     * @inheritDoc
     */
    public function getCompanyName()
    {
        return $this->company_name;
    }

    /**
     * @inheritDoc
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @inheritDoc
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @inheritDoc
     */
    public function getTaxNumber()
    {
        return $this->tax_nr;
    }

    public function isOrganization()
    {
        return $this->type->isOrganization();
    }

    public function isIndividual()
    {
        return $this->type->isIndividual();
    }

    public function getFullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastName(); // This is temporary. My ass.
    }
}

<?php


namespace Mitosis\Support\Traits;

/**
 * Trait for Eloquent Models with default implementation of the Address interface
 */
trait AddressModel
{
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function getCountryCode()
    {
        return $this->country_id;
    }

    /**
     * @inheritDoc
     */
    public function getProvinceCode()
    {
        return $this->province ? $this->province->code : null;
    }

    /**
     * @inheritDoc
     */
    public function getPostalCode()
    {
        return $this->postalcode;
    }

    /**
     * @inheritDoc
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @inheritDoc
     */
    public function getAddress()
    {
        return $this->address;
    }
}

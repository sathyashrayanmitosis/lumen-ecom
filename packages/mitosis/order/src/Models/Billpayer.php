<?php


namespace Mitosis\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Konekt\Address\Models\AddressProxy;
use Mitosis\Contracts\Address;
use Mitosis\Contracts\Billpayer as mitosisBillpayerContract;
use Mitosis\Order\Contracts\Billpayer as BillpayerContract;

/**
 * This is a temporary class in order to make checkout and order
 * work temporarily as of v0.1. Probably will be moved to the
 * billing module or another module, if it survives at all
 */
class Billpayer extends Model implements BillpayerContract, mitosisBillpayerContract
{
    protected $guarded = ['id', 'address_id'];

    public function isEuRegistered()
    {
        return $this->is_eu_registered;
    }

    public function address()
    {
        return $this->belongsTo(AddressProxy::modelClass());
    }

    public function getBillingAddress(): Address
    {
        return $this->address;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getName()
    {
        if ($this->isOrganization()) {
            return $this->getCompanyName();
        } else {
            return $this->getFullName();
        }
    }

    public function isOrganization()
    {
        return $this->is_organization;
    }

    public function isIndividual()
    {
        return !$this->is_organization;
    }

    public function getCompanyName()
    {
        return $this->company_name;
    }

    public function getTaxNumber()
    {
        return $this->tax_nr;
    }

    public function getFirstName()
    {
        return $this->firstname;
    }

    public function getLastName()
    {
        return $this->lastname;
    }

    public function getFullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }
}

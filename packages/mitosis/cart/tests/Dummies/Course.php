<?php


namespace Mitosis\Cart\Tests\Dummies;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Mitosis\Contracts\Buyable;
use Mitosis\Support\Traits\BuyableNoImage;

class Course extends Model implements Buyable
{
    use BuyableNoImage;

    protected $guarded = ['id'];

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->title;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function morphTypeName(): string
    {
        return static::class;
    }

    public function addSale(Carbon $date, $units = 1)
    {
        //
    }

    public function removeSale($units = 1)
    {
        //
    }
}

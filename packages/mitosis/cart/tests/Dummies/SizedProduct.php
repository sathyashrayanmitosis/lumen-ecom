<?php


namespace Mitosis\Cart\Tests\Dummies;

use Illuminate\Database\Eloquent\Model;
use Mitosis\Contracts\Buyable;
use Mitosis\Support\Traits\BuyableModel;
use Mitosis\Support\Traits\BuyableNoImage;

class SizedProduct extends Model implements Buyable
{
    use BuyableModel, BuyableNoImage;

    protected $guarded = ['id'];
}

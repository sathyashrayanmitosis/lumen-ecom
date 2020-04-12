<?php


namespace Mitosis\Properties\Tests\Examples;

use Illuminate\Database\Eloquent\Model;
use Mitosis\Properties\Traits\HasPropertyValues;

class Product extends Model
{
    use HasPropertyValues;

    protected $guarded = ['id'];
}

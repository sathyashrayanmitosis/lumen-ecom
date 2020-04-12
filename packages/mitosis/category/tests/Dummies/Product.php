<?php
/**
 * Contains the Product class.
 *
 * 
 * 
 * 
 * @since       2018-11-04
 *
 */

namespace Mitosis\Category\Tests\Dummies;

use Illuminate\Database\Eloquent\Model;
use Mitosis\Category\Traits\HasTaxons;

class Product extends Model
{
    use HasTaxons;

    protected $guarded = ['id'];
}

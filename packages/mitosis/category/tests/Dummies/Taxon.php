<?php

namespace Mitosis\Category\Tests\Dummies;

use Mitosis\Category\Models\Taxon as BaseTaxon;

class Taxon extends BaseTaxon
{
    public function products()
    {
        return $this->morphedByMany(Product::class, 'model', 'model_taxons', 'taxon_id', 'model_id');
    }
}

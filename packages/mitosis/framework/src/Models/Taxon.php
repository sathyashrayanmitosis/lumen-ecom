<?php


namespace Mitosis\Framework\Models;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Mitosis\Category\Models\Taxon as BaseTaxon;
use Mitosis\Product\Contracts\Product;
use Mitosis\Product\Models\ProductProxy;

class Taxon extends BaseTaxon
{
    public function products(): MorphToMany
    {
        return $this->morphedByMany(
            ProductProxy::modelClass(), 'model', 'model_taxons', 'taxon_id', 'model_id'
        );
    }

    public function addProduct(Product $product): void
    {
        $this->products()->attach($product);
    }

    public function addProducts(iterable $products)
    {
        foreach ($products as $product) {
            if (! $product instanceof Product) {
                throw new \InvalidArgumentException(
                    sprintf(
                        'Every element passed to addProduct must be a Product object. Given `%s`.',
                        is_object($product) ? get_class($product) : gettype($product)
                    )
                );
            }
        }

        return $this->products()->saveMany($products);
    }

    public function removeProduct(Product $product)
    {
        return $this->products()->detach($product);
    }
}

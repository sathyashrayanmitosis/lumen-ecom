<?php


namespace Mitosis\Category\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Mitosis\Category\Contracts\Taxonomy as TaxonomyContract;

class Taxonomy extends Model implements TaxonomyContract
{
    use Sluggable, SluggableScopeHelpers;

    protected $table = 'taxonomies';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static function findOneByName(string $name)
    {
        return static::where('name', $name)->first();
    }

    public function rootLevelTaxons(): Collection
    {
        return TaxonProxy::byTaxonomy($this)
                         ->roots()
                         ->sort()
                         ->get();
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}

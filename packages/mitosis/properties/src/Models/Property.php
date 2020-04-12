<?php


namespace Mitosis\Properties\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Mitosis\Properties\PropertyTypes;
use Mitosis\Properties\Contracts\Property as PropertyContract;
use Mitosis\Properties\Contracts\PropertyType;
use Mitosis\Properties\Exceptions\UnknownPropertyTypeException;

/**
 * @property string     $name
 * @property string     $slug
 * @property string     $type
 * @property array      $configuration
 * @property Collection $propertyValues
 */
class Property extends Model implements PropertyContract
{
    use Sluggable, SluggableScopeHelpers;

    protected $table = 'properties';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'configuration' => 'array'
    ];

    public function getType(): PropertyType
    {
        $class = PropertyTypes::getClass($this->type);

        if (!$class) {
            throw new UnknownPropertyTypeException(
                sprintf('Unknown property type `%s`', $this->type)
            );
        }

        return new $class();
    }

    public static function findOneByName(string $name): ?PropertyContract
    {
        return static::where('name', $name)->first();
    }

    public function values(): Collection
    {
        return $this->propertyValues()->sort()->get();
    }

    public function propertyValues(): HasMany
    {
        return $this->hasMany(PropertyValueProxy::modelClass());
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

<?php


namespace Mitosis\Properties\Traits;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Mitosis\Properties\Contracts\PropertyValue;
use Mitosis\Properties\Models\PropertyValueProxy;

trait HasPropertyValues
{
    public function propertyValues(): MorphToMany
    {
        return $this->morphToMany(PropertyValueProxy::modelClass(), 'model',
            'model_property_values', 'model_id', 'property_value_id'
        );
    }

    public function addPropertyValue(PropertyValue $propertyValue): void
    {
        $this->propertyValues()->attach($propertyValue);
    }

    public function addPropertyValues(iterable $propertyValues)
    {
        foreach ($propertyValues as $propertyValue) {
            if (! $propertyValue instanceof PropertyValue) {
                throw new \InvalidArgumentException(
                    sprintf(
                        'Every element passed to addPropertyValues must be a PropertyValue object. Given `%s`.',
                        is_object($propertyValue) ? get_class($propertyValue) : gettype($propertyValue)
                    )
                );
            }
        }

        return $this->propertyValues()->saveMany($propertyValues);
    }

    public function removePropertyValue(PropertyValue $propertyValue)
    {
        return $this->propertyValues()->detach($propertyValue);
    }
}

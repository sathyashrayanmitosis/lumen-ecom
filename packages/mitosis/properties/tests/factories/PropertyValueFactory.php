<?php

use Faker\Generator as Faker;
use Mitosis\Properties\Models\Property;
use Mitosis\Properties\Models\PropertyValue;

$factory->define(PropertyValue::class, function (Faker $faker) {
    $value = $faker->unique()->word;

    return [
        'property_id' => function () {
            return factory(Property::class)->create()->id;
        },
        'value' => strtolower($value),
        'title' => ucfirst($value)
    ];
});

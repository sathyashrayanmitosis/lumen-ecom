<?php

use Faker\Generator as Faker;
use Mitosis\Properties\Models\Property;

$factory->define(Property::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'type' => 'text'
    ];
});

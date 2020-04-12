<?php


namespace Mitosis\Properties\Providers;

use Konekt\Concord\BaseModuleServiceProvider;
use Mitosis\Properties\Models\Property;
use Mitosis\Properties\Models\PropertyValue;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        Property::class,
        PropertyValue::class
    ];
}

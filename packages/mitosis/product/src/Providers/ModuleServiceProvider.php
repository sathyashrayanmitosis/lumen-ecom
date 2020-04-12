<?php

namespace Mitosis\Product\Providers;

use Konekt\Concord\BaseModuleServiceProvider;
use Mitosis\Product\Models\Product;
use Mitosis\Product\Models\ProductState;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        Product::class
    ];

    protected $enums = [
        ProductState::class
    ];
}

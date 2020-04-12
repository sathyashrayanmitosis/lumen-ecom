<?php


namespace Mitosis\Category\Providers;

use Konekt\Concord\BaseModuleServiceProvider;
use Mitosis\Category\Models\Taxon;
use Mitosis\Category\Models\Taxonomy;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        Taxonomy::class,
        Taxon::class
    ];
}

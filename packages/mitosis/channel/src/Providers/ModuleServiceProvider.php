<?php


namespace Mitosis\Channel\Providers;

use Konekt\Concord\BaseModuleServiceProvider;
use Mitosis\Channel\Models\Channel;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        Channel::class
    ];
}

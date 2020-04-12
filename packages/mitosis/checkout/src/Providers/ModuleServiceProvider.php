<?php


namespace Mitosis\Checkout\Providers;

use Illuminate\Support\Str;
use Konekt\Concord\BaseModuleServiceProvider;
use Mitosis\Checkout\Contracts\Checkout as CheckoutContract;
use Mitosis\Checkout\CheckoutManager;
use Mitosis\Checkout\Contracts\CheckoutDataFactory;
use Mitosis\Checkout\Contracts\CheckoutStore;
use Mitosis\Checkout\Models\CheckoutState;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [];

    protected $enums = [
        CheckoutState::class
    ];

    public function register()
    {
        parent::register();

        $this->app->bind(CheckoutContract::class, CheckoutManager::class);

        $this->app->bind(CheckoutStore::class, function ($app) {
            $driverClass = $app['config']->get('mitosis.checkout.store.driver');
            if (false === strpos($driverClass, '\\')) {
                $driverClass = sprintf(
                    '\\Mitosis\\Checkout\\Drivers\\%sStore',
                    Str::studly($driverClass)
                );
            }

            return new $driverClass(
                $app['config']->get('mitosis.checkout.store'),
                $app->make(CheckoutDataFactory::class)
            );
        });

        $this->app->singleton('mitosis.checkout', function ($app) {
            return $app->make(CheckoutContract::class);
        });
    }
}

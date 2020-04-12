<?php


namespace Mitosis\Order\Providers;

use Illuminate\Support\Str;
use Konekt\Concord\BaseModuleServiceProvider;
use Mitosis\Order\Contracts\OrderFactory as OrderFactoryContract;
use Mitosis\Order\Contracts\OrderNumberGenerator;
use Mitosis\Order\Factories\OrderFactory;
use Mitosis\Order\Models\Billpayer;
use Mitosis\Order\Models\Order;
use Mitosis\Order\Models\OrderItem;
use Mitosis\Order\Models\OrderStatus;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        Billpayer::class,
        Order::class,
        OrderItem::class
    ];

    protected $enums = [
        OrderStatus::class
    ];

    public function boot()
    {
        parent::boot();

        $this->registerOrderNumberGenerator();

        // Bind the default implementation to the interface
        $this->app->bind(OrderFactoryContract::class, OrderFactory::class);
    }

    protected function registerOrderNumberGenerator()
    {
        $generatorClass = $this->app['config']->get('mitosis.order.number.generator', 'time_hash');
        $nsRoot         = $this->getNamespaceRoot();

        $this->app->bind(OrderNumberGenerator::class, function ($app) use ($generatorClass, $nsRoot) {
            if (!class_exists($generatorClass)) {
                $generatorClass = sprintf('%s\\Generators\\%sGenerator',
                    $nsRoot, Str::studly($generatorClass)
                );
            }

            return $app->make($generatorClass);
        });
    }
}

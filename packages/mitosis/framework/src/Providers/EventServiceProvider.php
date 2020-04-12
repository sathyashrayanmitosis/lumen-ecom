<?php


namespace Mitosis\Framework\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Mitosis\Framework\Listeners\UpdateSalesFigures;
use Mitosis\Order\Events\OrderWasCreated;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        OrderWasCreated::class => [
            UpdateSalesFigures::class
        ]
    ];
}

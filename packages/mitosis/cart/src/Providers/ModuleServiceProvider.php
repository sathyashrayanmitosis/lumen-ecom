<?php

namespace Mitosis\Cart\Providers;

use Konekt\Concord\BaseModuleServiceProvider;
use Mitosis\Cart\CartManager;
use Mitosis\Cart\Contracts\CartManager as CartManagerContract;
use Mitosis\Cart\Models\Cart;
use Mitosis\Cart\Models\CartItem;
use Mitosis\Cart\Models\CartState;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        Cart::class,
        CartItem::class
    ];

    protected $enums = [
        CartState::class
    ];

    public function register()
    {
        parent::register();

        $this->app->bind(CartManagerContract::class, CartManager::class);

        $this->app->singleton('mitosis.cart', function ($app) {
            return $app->make(CartManagerContract::class);
        });
    }
}

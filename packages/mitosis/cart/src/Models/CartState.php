<?php


namespace Mitosis\Cart\Models;

use Konekt\Enum\Enum;
use Mitosis\Cart\Contracts\CartState as CartStateContract;

class CartState extends Enum implements CartStateContract
{
    const __default  = self::ACTIVE;
    const ACTIVE     = 'active';
    const CHECKOUT   = 'checkout';
    const COMPLETED  = 'completed';
    const ABANDONDED = 'abandoned';

    protected static $labels = [];

    protected static $activeStates = [self::ACTIVE, self::CHECKOUT];

    /**
     * @inheritDoc
     */
    public function isActive(): bool
    {
        return in_array($this->value, static::$activeStates);
    }

    /**
     * @inheritDoc
     */
    public static function getActiveStates(): array
    {
        return static::$activeStates;
    }

    protected static function boot()
    {
        static::$labels = [
            self::ACTIVE     => __('Active'),
            self::CHECKOUT   => __('Checkout'),
            self::COMPLETED  => __('Completed'),
            self::ABANDONDED => __('Abandoned')
        ];
    }
}

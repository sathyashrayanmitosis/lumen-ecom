<?php


namespace Mitosis\Order\Models;

use Konekt\Enum\Enum;
use Mitosis\Order\Contracts\OrderStatus as OrderStatusContract;

class OrderStatus extends Enum implements OrderStatusContract
{
    const __default = self::PENDING;

    /**
     * Pending orders are brand new orders that have not been processed yet.
     */
    const PENDING = 'pending';

    /**
     * Orders fulfilled completely.
     */
    const COMPLETED = 'completed';

    /**
     * Order that has been cancelled.
     */
    const CANCELLED = 'cancelled';

    // $labels static property needs to be defined
    public static $labels = [];

    protected static function boot()
    {
        static::$labels = [
            self::PENDING     => __('Pending'),
            self::COMPLETED   => __('Completed'),
            self::CANCELLED   => __('Cancelled')
        ];
    }
}

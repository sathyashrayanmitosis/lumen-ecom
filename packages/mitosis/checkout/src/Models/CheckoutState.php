<?php


namespace Mitosis\Checkout\Models;

use Konekt\Enum\Enum;
use Mitosis\Checkout\Contracts\CheckoutState as CheckoutStateContract;

class CheckoutState extends Enum implements CheckoutStateContract
{
    const __default = self::VIRGIN;

    const VIRGIN    = null;        // There was no interaction with the checkout process yet
    const STARTED   = 'started';   // The checkout process has been started
    const READY     = 'ready';     // Checkout data is valid and ready to submit
    const COMPLETED = 'completed'; // Checkout has been completed

    protected static $submittableStates = [self::READY];

    /**
     * @inheritdoc
     */
    public function canBeSubmitted()
    {
        return in_array($this->value, static::$submittableStates);
    }

    /**
     * @inheritdoc
     */
    public static function getSubmittableStates()
    {
        return static::$submittableStates;
    }
}

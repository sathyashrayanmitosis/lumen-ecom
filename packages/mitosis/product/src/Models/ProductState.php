<?php



namespace Mitosis\Product\Models;

use Konekt\Enum\Enum;
use Mitosis\Product\Contracts\ProductState as ProductStateContract;

class ProductState extends Enum implements ProductStateContract
{
    const __default = self::DRAFT;

    const DRAFT       = 'draft';
    const INACTIVE    = 'inactive';
    const ACTIVE      = 'active';
    const UNAVAILABLE = 'unavailable';
    const RETIRED     = 'retired';

    protected static $activeStates = [self::ACTIVE];

    /**
     * @inheritdoc
     */
    public function isActive()
    {
        return in_array($this->value, static::$activeStates);
    }

    /**
     * @inheritdoc
     */
    public static function getActiveStates()
    {
        return static::$activeStates;
    }
}

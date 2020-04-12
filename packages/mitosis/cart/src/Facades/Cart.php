<?php


namespace Mitosis\Cart\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Support\Collection getItems()
 * @method static \Mitosis\Cart\Contracts\CartItem addItem(Buyable $product, $qty = 1, $params = [])
 * @method static removeItem($item)
 * @method static removeProduct(\Mitosis\Contracts\Buyable $product)
 * @method static clear()
 * @method static restoreLastActiveCart(object|int $user)
 * @method static mergeLastActiveCartWithSessionCart(object|int $user)
 * @method static int itemCount()
 * @method static total()
 * @method static bool exists()
 * @method static bool doesNotExist()
 * @method static model()
 * @method static bool isEmpty()
 * @method static bool isNotEmpty()
 * @method static destroy()
 * @method static create($forceCreateIfExists = false)
 * @method static \Illuminate\Contracts\Auth\Authenticatable|null getUser()
 * @method static setUser($user)
 * @method static removeUser()
 */
class Cart extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mitosis.cart';
    }
}

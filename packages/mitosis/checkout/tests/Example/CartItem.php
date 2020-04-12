<?php


namespace Mitosis\Checkout\Tests\Example;

use Mitosis\Contracts\Buyable;
use Mitosis\Contracts\CheckoutSubjectItem;

class CartItem implements CheckoutSubjectItem
{
    /** @var  Buyable */
    protected $product;

    /** @var  integer */
    protected $qty;

    public function __construct(Buyable $product, $qty)
    {
        $this->product = $product;
        $this->qty     = $qty;
    }

    public function increaseQuantityWith($increment)
    {
        $this->qty += $increment;
    }

    /**
     * @inheritDoc
     */
    public function getBuyable(): Buyable
    {
        return $this->product;
    }

    /**
     * @inheritDoc
     */
    public function getQuantity()
    {
        return $this->qty;
    }

    /**
     * @inheritDoc
     */
    public function total()
    {
        return $this->product->getPrice() * $this->qty;
    }
}

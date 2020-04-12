<?php



namespace Mitosis\Order\Tests;

use Mitosis\Contracts\Buyable;
use Mitosis\Order\Models\Order;
use Mitosis\Order\Tests\Dummies\Product;

class OrderItemProductTest extends TestCase
{
    /** @var Product */
    protected $theMoonRing;

    public function setUp(): void
    {
        parent::setUp();

        $this->theMoonRing = Product::create([
            'name'  => 'The Moon Ring',
            'sku'   => 'B01KR3SAIS',
            'price' => 17.95
        ]);
    }


    /**
     * @test
     */
    public function product_can_be_added_to_order_item()
    {
        $order = Order::create([
            'number' => 'FVJH8'
        ]);

        $order->items()->create([
            'product_type' => 'product',
            'product_id'   => $this->theMoonRing->getId(),
            'quantity'     => 1,
            'name'         => $this->theMoonRing->getName(),
            'price'        => $this->theMoonRing->getPrice()
        ]);

        $item    = $order->items->first();
        $product = $item->product;
        $this->assertInstanceOf(Buyable::class, $product);
        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($this->theMoonRing->getName(), $product->getName());

        // Re-fetch from DB
        $order = $order->fresh();

        // And repeat the test
        $item    = $order->items->first();
        $product = $item->product;
        $this->assertInstanceOf(Buyable::class, $product);
        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($this->theMoonRing->getName(), $product->getName());
    }
}

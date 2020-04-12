<?php


namespace Mitosis\Cart\Tests;

use Mitosis\Cart\Facades\Cart;
use Mitosis\Cart\Tests\Dummies\Course;
use Mitosis\Cart\Tests\Dummies\Product;

class CartItemProductTest extends TestCase
{
    /** @var  Product */
    protected $alaskaSnow;

    /** @var  Course */
    protected $reactForBeginners;

    protected function setUp(): void
    {
        parent::setUp();

        $this->alaskaSnow = Product::create([
            'name'  => 'Alaska Snow 34oz',
            'price' => 9
        ]);

        $this->reactForBeginners = Course::create([
            'title' => 'React For Beginners',
            'price' => 89
        ]);
    }

    /**
     * @test
     */
    public function the_cart_item_returns_the_associated_product_with_a_custom_morph_type_name()
    {
        Cart::addItem($this->alaskaSnow);

        $product = Cart::model()->items->first()->product;

        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($this->alaskaSnow->id, $product->id);
    }

    /**
     * @test
     */
    public function the_cart_item_returns_the_associated_product_with_fqcn_as_morph_type_name()
    {
        Cart::addItem($this->reactForBeginners);

        $course = Cart::model()->items->first()->product;

        $this->assertInstanceOf(Course::class, $course);
        $this->assertEquals($this->reactForBeginners->id, $course->id);
    }
}

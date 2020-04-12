<?php


namespace Mitosis\Cart\Tests;

use Mitosis\Cart\Exceptions\InvalidCartConfigurationException;
use Mitosis\Cart\Facades\Cart;

class SessionTest extends TestCase
{
    /** @test */
    public function a_session_has_no_cart_by_default()
    {
        $this->assertFalse(Cart::exists());
    }

    /** @test */
    public function cart_manager_emits_a_notice_if_the_session_key_config_entry_is_empty()
    {
        config(['mitosis.cart.session_key' => null]);
        $this->expectException(InvalidCartConfigurationException::class);
        Cart::exists();
    }
}

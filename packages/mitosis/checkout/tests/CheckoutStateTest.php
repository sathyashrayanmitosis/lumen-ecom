<?php


namespace Mitosis\Checkout\Tests;

use Mitosis\Checkout\Models\CheckoutState;

class CheckoutStateTest extends TestCase
{
    /**
     * @test
     */
    public function ready_is_a_submittable_state()
    {
        $this->assertTrue(CheckoutState::READY()->canBeSubmitted());
    }

    /**
     * @test
     */
    public function the_default_state_is_not_submittable()
    {
        $this->assertFalse(CheckoutState::create()->canBeSubmitted());
    }
}

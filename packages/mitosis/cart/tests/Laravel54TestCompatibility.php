<?php


namespace Mitosis\Cart\Tests;

use Illuminate\Foundation\Testing\Concerns\InteractsWithAuthentication;
use Illuminate\Foundation\Testing\Concerns\InteractsWithSession;

trait Laravel54TestCompatibility
{
    use InteractsWithSession, InteractsWithAuthentication;

    public function assertAuthenticatedAs($user, $guard = null)
    {
        if (is_callable('parent::assertAuthenticatedAs')) {
            return parent::assertAuthenticatedAs($user, $guard);
        } elseif (method_exists($this, 'seeIsAuthenticatedAs')) {
            return $this->seeIsAuthenticatedAs($user, $guard);
        }

        $this->throwBadMethodCallException('assertAuthenticatedAs');
    }

    public function assertGuest($guard = null)
    {
        if (is_callable('parent::assertGuest')) {
            return parent::assertGuest($guard);
        } elseif (method_exists($this, 'dontSeeIsAuthenticated')) {
            return $this->dontSeeIsAuthenticated($guard);
        }

        $this->throwBadMethodCallException('assertGuest');
    }

    private function throwBadMethodCallException(string $methodName)
    {
        throw new \BadMethodCallException(
            sprintf(
                "Don't know how to call `%s` on `%s`",
                $methodName,
                get_class($this)
            )
        );
    }
}

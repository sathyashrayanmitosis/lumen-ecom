<?php


namespace Mitosis\Cart\Providers;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Mitosis\Cart\Listeners\AssignUserToCart;
use Mitosis\Cart\Listeners\DissociateUserFromCart;
use Mitosis\Cart\Listeners\RestoreCurrentUsersLastActiveCart;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Login::class => [
            AssignUserToCart::class,
            RestoreCurrentUsersLastActiveCart::class,
        ],
        Authenticated::class => [
            AssignUserToCart::class,
            RestoreCurrentUsersLastActiveCart::class,
        ],
        Logout::class => [
            DissociateUserFromCart::class
        ],
        Lockout::class => [
            DissociateUserFromCart::class
        ]
    ];
}

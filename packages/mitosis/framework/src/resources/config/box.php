<?php

return [
    'modules' => [
        Mitosis\Category\Providers\ModuleServiceProvider::class   => [],
        Mitosis\Product\Providers\ModuleServiceProvider::class    => [],
        Mitosis\Properties\Providers\ModuleServiceProvider::class => [],
        Mitosis\Channel\Providers\ModuleServiceProvider::class    => [],
        Mitosis\Cart\Providers\ModuleServiceProvider::class       => [],
        Mitosis\Checkout\Providers\ModuleServiceProvider::class   => [],
        Mitosis\Order\Providers\ModuleServiceProvider::class      => []
    ],
    'event_listeners' => true,
    'views'           => [
        'namespace' => 'mitosis'
    ],
    'routes' => [
        'prefix'     => 'admin',
        'as'         => 'mitosis.',
        'middleware' => ['web', 'auth', 'acl'],
        'files'      => ['admin']
    ],
    'breadcrumbs' => true,
    'image'       => [
        'variants' => [
            'thumbnail' => [
                'width'  => 250,
                'height' => 250,
                'fit'    => 'crop'
            ]
        ]
    ],
    'currency'    => [
        'code'   => 'USD',
        'sign'   => '$',
        'format' => '%2$s%1$g' // see sprintf. Amount is the first argument, currency is the second
        /* EURO example:
        'code'   => 'EUR',
        'sign'   => '€',
        'format' => '%1$g%2$s'
        */
    ]
];

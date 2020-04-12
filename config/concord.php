<?php

return [
    'modules' => [
        
        Konekt\AppShell\Providers\ModuleServiceProvider::class => [
            'ui' => [
                'name' => 'Mitosis',
                'url' => '/admin/product'
            ]
        ],
        Mitosis\Framework\Providers\ModuleServiceProvider::class
    ]
];

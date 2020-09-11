<?php

return [
    'default' => 'default',

    'themes' => [
        'default' => [
            'views_path' => 'resources/themes/default/views',
            'assets_path' => 'public/themes/default/assets',
            'name' => 'Default'
        ],

        'velocity' => [
            'views_path' => 'resources/themes/velocity/views',
            'assets_path' => 'public/themes/velocity/assets',
            'name' => 'Velocity',
            'parent' => 'default'
        ],

        
        'jean' => [
             'views_path' => 'resources/themes/jean/views',
             'assets_path' => 'public/themes/jean/assets',
             'name' => 'Jean',
             'parent' => 'default'
        ]

    ]
];
<?php

return [
    // Whether multi-language is enabled
    'languages' => true,

    // Use the Panel’s built-in installation screen only in non-production or the first time
    'panel' => [
        'install' => true
    ],

    // International date handler (recommended for better date handling)
    'date.handler' => 'intl',

    // Thumbs configuration for automatically resizing images
    'thumbs' => [
        'presets' => [
            'default' => ['width' => 1000, 'quality' => 80],
            // You can add custom presets, e.g. a small thumbnail:
            'thumbnail' => ['width' => 400, 'quality' => 80]
        ]
    ],

    // Example custom routes (optional)
    // 'routes' => [
    //     [
    //       'pattern' => 'my-custom-path',
    //       'action'  => function () {
    //         return 'Hello from my custom route!';
    //       }
    //     ]
    // ],

    // Example hooks (optional)
    // 'hooks' => [
    //     'page.create:after' => function ($page) {
    //         // Do something after a new page is created
    //     },
    // ],

    // Default cache settings (override them in environment configs if needed)
    'cache' => [
        'pages' => [
            'active' => true  // Typically off in dev, may be turned on in production
        ]
    ],
];

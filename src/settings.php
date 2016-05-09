<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/views/',
        ],

        // Database settings
        'db' => [
            'host' => 'localhost',
            'user' => 'homestead',
            'pass' => 'secret',
            'dbname' => 'reverse_bid',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'reverse-bid',
            'path' => __DIR__ . '/../logs/app.log',
        ],
    ],
];

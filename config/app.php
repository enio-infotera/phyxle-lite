<?php

// App configurations
$settings = [
    // Settings container
    'settings' => [
        // Protocol version used by response object
        'httpVersion' => '1.1',

        // Size of each response chunk
        'responseChunkSize' => 4096,

        // Prepend or append output buffer
        'outputBuffering' => 'prepend',

        // Calculate routes before app middleware
        'determineRouteBeforeAppMiddleware' => false,

        // Display Slim errors. Set false in production mode.
        'displayErrorDetails' => true,

        // Add content length header to response object
        'addContentLengthHeader' => true,

        // Cache file names
        'routerCacheFile' => false,

        // App settings
        'app' => [
            // App name
            'name' => 'Phyxle Lite',

            // App description
            'description' => 'Rapid web development environment, based on Slim framework (Lite version)',

            // App keywords
            'keywords' => 'carbon, eloquent, enindu, php, slim, slim-session, swift-mailer, twig, validation',

            // App author
            'author' => 'Enindu Alahapperuma',

            // App URL
            'url' => 'http://localhost',

            // App email
            'email' => 'enindu@gmail.com',

            // App timezone
            'timezone' => 'Asia/Colombo'
        ],

        // View settings
        'view' => [
            // Templates directory
            'views' => __DIR__ . '/../resources/views/',

            // Enable debug mode
            'debug' => false,

            // Templates character set
            'charset' => 'utf-8',

            // Base template class to render
            'baseTemplateClass' => '\Twig\Template',

            // Cache directory
            'cache' => __DIR__ . '/../cache/',

            // Enable cached templates to auto reload
            'autoReload' => true,

            // Throw error if invalid template variable used
            'strictVariables' => true,

            // Auto escape characters
            'autoEscape' => 'html',

            // Optimize templates
            'optimizations' => -1
        ],

        // Database settings
        'database' => [
            // Database driver
            'driver' => 'mysql',

            // Database host
            'host' => 'localhost',

            // Database name
            'database' => '',

            // Database username
            'username' => '',

            // Database password
            'password' => '',

            // Database character set
            'charset' => 'utf8',

            // Database collation
            'collation' => 'utf8_unicode_ci',

            // Table prefix
            'prefix' => ''
        ],

        // Mail settings
        'mail' => [
            // SMTP host
            'host' => '',

            // SMTP port
            'port' => '',

            // SMTP username
            'username' => '',

            // SMTP password
            'password' => ''
        ],

        // Validation settings
        'validation' => [
            // Required error message
            'required' => 'Cannot leave empty fields',

            // Minimum characters error message
            'min' => 'Some input fields should be minimum 6 characters',

            // Maximum characters error message
            'max' => 'Some input fields should be maximum 32 characters',

            // Email error message
            'email' => 'Email is invalid',

            // Comparison error message
            'same' => 'Check confirm password'
        ],

        // Middleware configurations
        'middleware' => [
            // Session middleware settings
            'session' => [
                // Session lifetime
                'lifetime' => 0,

                // Session path
                'path' => '/',

                // Session domain
                'domain' => '',

                // Set session secure
                'secure' => false,

                // Set session for HTTP only
                'httpOnly' => false,

                // Session name
                'name' => 'phyxle_session',

                // Enable session auto refresh
                'autoRefresh' => false,

                // Session handler
                'handler' => null
            ]
        ]
    ]
];
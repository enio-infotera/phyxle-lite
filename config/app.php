<?php

$settings = [
  'settings' => [
    // Slim settings
    'httpVersion'                       => '1.1',
    'responseChunkSize'                 => 4096,
    'outputBuffering'                   => 'prepend',
    'determineRouteBeforeAppMiddleware' => false,
    'displayErrorDetails'               => true,
    'addContentLengthHeader'            => true,
    'routerCacheFile'                   => false,

    // App settings
    'app' => [
      'name'        => 'Phyxle Lite',
      'description' => 'Rapid web development environment, based on Slim framework (Lite version)',
      'keywords'    => 'carbon, eloquent, enindu, php, slim, slim-session, swift-mailer, twig, validation',
      'author'      => 'Enindu Alahapperuma',
      'url'         => 'http://localhost',
      'email'       => 'enindu@gmail.com',
      'timezone'    => 'Asia/Colombo'
    ],

    // View settings
    'view' => [
      'views'             => __DIR__ . '/../resources/views/',
      'debug'             => false,
      'charset'           => 'utf-8',
      'baseTemplateClass' => '\Twig\Template',
      'cache'             => __DIR__ . '/../cache/',
      'autoReload'        => true,
      'strictVariables'   => true,
      'autoEscape'        => 'html',
      'optimizations'     => -1
    ],

    // Database settings
    'database' => [
      'driver'    => 'mysql',
      'host'      => 'localhost',
      'database'  => '',
      'username'  => '',
      'password'  => '',
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => ''
    ],

    // Mail settings
    'mail' => [
      'host'     => '',
      'port'     => '',
      'username' => '',
      'password' => ''
    ],

    // Validation settings
    'validation' => [
      'required' => 'Cannot leave empty fields',
      'min'      => 'Some input fields have minimum characters length',
      'max'      => 'Some input fields have maximum characters length',
      'email'    => 'Email is invalid',
      'numeric'  => 'Some input fields require only numbers',
      'same'     => 'Check confirm password'
    ],

    'middleware' => [
      // Session middleware settings
      'session' => [
        'lifetime'    => 0,
        'path'        => '/',
        'domain'      => '',
        'secure'      => false,
        'httpOnly'    => false,
        'name'        => 'phyxle_session',
        'autoRefresh' => false,
        'handler'     => null
      ]
    ]
  ]
];
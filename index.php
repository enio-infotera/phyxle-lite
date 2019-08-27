<?php

use Slim\App;
use Slim\Container;

// Composer autoload
require_once __DIR__ . "/vendor/autoload.php";

// App configurations
require_once __DIR__ . "/config/app.php";

// App timezone
date_default_timezone_set($settings['settings']['app']['timezone']);

// Create dependency container
$container = new Container($settings);

// Middleware containers
require_once __DIR__ . "/config/middleware/session.php";
// Add new middleware container here

// Package containers
require_once __DIR__ . "/config/filesystem.php";
require_once __DIR__ . "/config/view.php";
require_once __DIR__ . "/config/database.php";
require_once __DIR__ . "/config/mail.php";
require_once __DIR__ . "/config/validation.php";
require_once __DIR__ . "/config/time.php";
require_once __DIR__ . "/config/errors.php";
// Add new package container here

// Create app
$app = new App($container);

// Middleware
require_once __DIR__ . "/app/middleware.php";

// Routes
require_once __DIR__ . "/app/routes.php";

// Run app
$app->run();
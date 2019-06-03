<?php

use Slim\App;
use Slim\Container;

// Require Conposer autoload
require_once __DIR__ . "/vendor/autoload.php";

// Require app configurations
require_once __DIR__ . "/config/app.php";

// Configure app timezone
date_default_timezone_set($settings['settings']['app']['timezone']);

// Create app container
$container = new Container($settings);

// Load middleware containers. Add new containers to bottom.
require_once __DIR__ . "/config/middleware/session.php";

// Load package containers. Add new containers to bottom.
require_once __DIR__ . "/config/filesystem.php";
require_once __DIR__ . "/config/view.php";
require_once __DIR__ . "/config/database.php";
require_once __DIR__ . "/config/mail.php";
require_once __DIR__ . "/config/validation.php";
require_once __DIR__ . "/config/time.php";
require_once __DIR__ . "/config/errors.php";

// Create app
$app = new App($container);

// Require app middleware
require_once __DIR__ . "/app/middleware.php";

// Require app routes
require_once __DIR__ . "/app/routes.php";

// Run app
$app->run();
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

// Load package container. Add new containers to bottom.
require_once __DIR__ . "/config/filesystem.php";
require_once __DIR__ . "/config/view.php";
require_once __DIR__ . "/config/database.php";
require_once __DIR__ . "/config/mail.php";

// Create app
$app = new App($container);

// Require app routes
require_once __DIR__ . "/app/routes.php";

// Run app
$app->run();
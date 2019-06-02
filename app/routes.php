<?php

use App\Controller\Pages;

// App routes
$app->get('/', Pages::class . ':home');
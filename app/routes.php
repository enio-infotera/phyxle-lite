<?php

use App\Controller\Pages;

// Routes
$app->get('/', Pages::class . ':home');
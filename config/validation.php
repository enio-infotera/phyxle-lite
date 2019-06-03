<?php

use Rakit\Validation\Validator;
use Slim\Container;

// Validation container
$container['validation'] = function(Container $container) {
    // Validation settings
    $settings = $container->get('settings')['validation'];

    // Create validation object
    $validation = new Validator;

    // Add custom error messages to validation
    $validation->setMessages([
        'required' => $settings['required'],
        'min' => $settings['min'],
        'max' => $settings['max'],
        'email' => $settings['email'],
        'same' => $settings['same']
    ]);

    // Return validation object
    return $validation;
};
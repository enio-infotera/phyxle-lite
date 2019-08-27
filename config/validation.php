<?php

use Rakit\Validation\Validator;
use Slim\Container;

// Validation container
$container['validation'] = function(Container $container) {
  // Get validation settings
  $settings = $container->get('settings')['validation'];

  // Create validation object
  $validation = new Validator;

  $validation->setMessages([
    'required' => $settings['required'],
    'min'      => $settings['min'],
    'max'      => $settings['max'],
    'email'    => $settings['email'],
    'same'     => $settings['same']
  ]);

  // Return validation object
  return $validation;
};
<?php

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

// Get error settings
$errors = $container->get('settings')['displayErrorDetails'];

// Check error status
if(!$errors) {
  // 404 error
  $container['notFoundHandler'] = function(Container $container) {
    return function(Request $request, Response $response) use($container) {
      return $response->withStatus(404)->withHeader('Content-Type', 'text/html')->write($container->get('view')->render('templates/404.twig'));
    };
  };

  // 405 error
  $container['notAllowedHandler'] = function(Container $container) {
    return function(Request $request, Response $response, array $methods) use($container) {
      return $response->withStatus(405)->withHeader('Allow', implode(', ', $methods))->withHeader('Content-Type', 'text/html')->write($container->get('view')->render('templates/405.twig'));
    };
  };

  // 500 error
  $container['phpErrorHandler'] = function(Container $container) {
    return function(Request $request, Response $response) use($container) {
      return $response->withStatus(500)->withHeader('Content-Type', 'text/html')->write($container->get('view')->render('templates/500.twig'));
    };
  };
}
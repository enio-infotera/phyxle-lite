<?php

namespace App\Controller;

use Slim\Container;
use Slim\Http\Response;

class Base
{
    // Get contained packages from containers
    protected $container;

    // Pass data to Twig templates
    protected $data = [];

    /**
     * Base controller constructor
     * 
     * @param Container $container PSR-11 container object
     */
    public function __construct(Container $container)
    {
        // Get dependency container
        $this->container = $container;

        // Get database to run on every request
        $container->get('database');
    }

    /**
     * Configure view to use in child controllers
     * 
     * @param Response $response PSR-7 response object
     * @param string   $template Twig template file name
     * 
     * @return Response
     */
    public function view(Response $response, string $template)
    {
        // Get view object
        $view = $this->container->get('view');

        // Return response
        return $response->withHeader('Content-Type', 'text/html')->write($view->render($template, $this->data));
    }
}
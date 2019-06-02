<?php

namespace App\Extension;

use Slim\Container;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class Functions extends AbstractExtension
{
    // Get contained packages from containers
    private $container;

    /**
     * Functions extension constructor
     *
     * @param Container $container PSR-11 container object
     */
    public function __construct(Container $container)
    {
        // Get dependency container
        $this->container = $container;
    }

    /**
     * Define Twig functions
     *
     * @return array
     */
    public function getFunctions()
    {
        // Return functions
        return [
            new TwigFunction('echo', [$this, 'echo']),
        ];
    }

    /**
     * Echo function in Twig templates
     * 
     * @param string $text Any kind of string
     * 
     * @return void
     */
    public function echo(string $text)
    {
        echo $text;

        return;
    }
}
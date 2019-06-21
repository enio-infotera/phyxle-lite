<?php

namespace App\Extension;

use Slim\Container;
use Twig\Error\RuntimeError;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class Filters extends AbstractExtension
{
    // Get contained packages from containers
    private $container;

    /**
     * Filters extension constructor
     * 
     * @param Container $container PSR-11 container object
     */
    public function __construct(Container $container)
    {
        // Get dependency container
        $this->container = $container;
    }

    /**
     * Define Twig filters
     * 
     * @return array
     */
    public function getFilters()
    {
        // Return filters
        return [
            new TwigFilter('asset', [$this, 'asset']),
            new TwigFilter('page', [$this, 'page'])
        ];
    }

    /**
     * Asset filter to use stylesheets, scripts, images, etc. in Twig templates
     * 
     * @param string $file Asset file name
     * 
     * @throws RuntimeError
     * @return string
     */
    public function asset(string $file)
    {
        // Get filesystem object
        $filesystem = $this->container->get('filesystem');

        // Get absolute path to asset
        $asset = __DIR__ . "/../../resources/assets/" . $file;

        // Check if asset is not available
        if(!$filesystem->exists($asset)) {
            throw new RuntimeError('Unable to find "' . $file . '".');
        }

        // Return asset URL
        return $this->container->get('settings')['app']['url'] . "/resources/assets/" . $file;
    }

    /**
     * Page filter to define internal routes in Twig templates
     * 
     * @param string $route Internal route
     * 
     * @return string
     */
    public function page(string $route)
    {
        // Return route URL
        return $this->container->get('settings')['app']['url'] . $route;
    }
}
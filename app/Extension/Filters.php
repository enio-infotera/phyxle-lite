<?php

namespace App\Extension;

use Slim\Container;
use Twig\Error\RuntimeError;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class Filters extends AbstractExtension
{
  // Dependency container
  private $container;

  /**
   * Constructor
   * 
   * @param Container $container PSR-11 container object
   */
  public function __construct(Container $container)
  {
    // Get dependency container
    $this->container = $container;
  }

  /**
   * Filters
   * 
   * @return array
   */
  public function getFilters()
  {
    return [
      new TwigFilter('asset', [$this, 'asset']),
      new TwigFilter('page', [$this, 'page'])
    ];
  }

  /**
   * Asset filter
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

    // Check asset availability
    if(!$filesystem->exists($asset)) {
      throw new RuntimeError('Unable to find "' . $file . '".');
    }

    // Return asset URL
    return $this->container->get('settings')['app']['url'] . "/resources/assets/" . $file;
  }

  /**
   * Page filter
   * 
   * @param string $route Internal route
   * 
   * @return string
   */
  public function page(string $route)
  {
    return $this->container->get('settings')['app']['url'] . $route;
  }
}
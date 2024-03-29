<?php

namespace App\Extension;

use Slim\Container;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

class Globals extends AbstractExtension implements GlobalsInterface
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
   * Global variables
   * 
   * @return array
   */
  public function getGlobals()
  {
    return [
      'app' => [
        'name'        => $this->container->get('settings')['app']['name'],
        'description' => $this->container->get('settings')['app']['description'],
        'keywords'    => $this->container->get('settings')['app']['keywords'],
        'author'      => $this->container->get('settings')['app']['author'],
        'url'         => $this->container->get('settings')['app']['url']
      ]
    ];
  }
}
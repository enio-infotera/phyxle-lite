<?php

namespace App\Extension;

use Slim\Container;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class Functions extends AbstractExtension
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
   * Functions
   *
   * @return array
   */
  public function getFunctions()
  {
    return [
      new TwigFunction('echo', [$this, 'echo']),
    ];
  }

  /**
   * Echo function
   * 
   * @return string
   */
  public function echo(string $text)
  {
    return $text;
  }
}
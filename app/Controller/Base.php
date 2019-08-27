<?php

namespace App\Controller;

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class Base
{
  // Dependency container
  protected $container;

  // Template data array
  protected $data;

  // Filesystem object
  protected $filesystem;

  // Time object
  protected $time;

  /**
   * Constructor
   * 
   * @param Container $container PSR-11 container object
   */
  public function __construct(Container $container)
  {
    // Get dependency container
    $this->container = $container;

    // Get template data array
    $this->data = [];

    // Get contained objects
    $this->filesystem = $container->get('filesystem');
    $this->view = $container->get('view');
    $this->time = $container->get('time');

    // Run database object
    $container->get('database');
  }

  /**
   * Use templates
   * 
   * @param Response $response PSR-7 response object
   * @param string   $template Twig template file name
   * 
   * @return Response
   */
  protected function view(Response $response, string $template)
  {
    return $response->withHeader('Content-Type', 'text/html')->write($this->view->render($template, $this->data));
  }

  /**
   * Send mails
   * 
   * @param array  $data     Mail subject, from, to and body data
   * @param string $template Mail template name
   * @param string $type     Mail type
   * 
   * @return int
   */
  protected function mail(array $data, string $template = 'base', string $type = 'text/html')
  {
    // Get mail template
    $template = $this->view->render('templates/mails/' . $template . '.twig', $data);

    // Get message object
    $message = $this->container->get('message');

    // Create mail
    $message->setSubject($data['subject']);
    $message->setFrom($data['from']);
    $message->setTo($data['to']);
    $message->setBody($template, $type);

    // Get mail object
    $mail = $this->container->get('mail');

    // Send mail
    return $mail->send($message);
  }

  /**
   * Use form validation
   * 
   * @param Request $request PSR-7 request object
   * @param array   $input   Form input data
   * 
   * @return array|bool
   */
  protected function validator(Request $request, array $input)
  {
    // Get validation object
    $validator = $this->container->get('validation');

    // Validate form
    $validation = $validator->validate($request->getParams(), $input);

    // Check validation
    if($validation->fails()) {
      return $validation->errors()->firstOfAll();
    }

    // Return false
    return;
  }
}
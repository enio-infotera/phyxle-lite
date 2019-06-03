<?php

namespace App\Controller;

use Slim\Container;
use Slim\Http\Response;

class Base
{
    // Get contained packages from containers
    protected $container;

    // Pass data to view templates
    protected $data = [];

    // Pass filesystem object to child controllers
    protected $filesystem;

    /**
     * Base controller constructor
     * 
     * @param Container $container PSR-11 container object
     */
    public function __construct(Container $container)
    {
        // Get dependency container
        $this->container = $container;

        // Get filesystem object
        $this->filesystem = $container->get('filesystem');

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
    protected function view(Response $response, string $template)
    {
        // Get view object
        $view = $this->container->get('view');

        // Return response
        return $response->withHeader('Content-Type', 'text/html')->write($view->render($template, $this->data));
    }

    /**
     * Configure mail to use in child controllers
     * 
     * @param array  $data Mail subject, from, to and body data
     * @param string $type Mail type
     * 
     * @return int
     */
    protected function mail(array $data, string $type = 'text/html')
    {
        // Get view object
        $view = $this->container->get('view');

        // Create mail template
        $template = $view->render('templates/mail.twig', $data);

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
}
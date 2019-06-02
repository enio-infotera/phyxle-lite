<?php

namespace App\Controller;

use App\Controller\Base;
use Slim\Http\Request;
use Slim\Http\Response;

class Pages extends Base
{
    /**
     * Return homepage
     * 
     * @param Request  $request  PSR-7 request object
     * @param Response $response PSR-7 response object
     * @param array    $data     URL parameters
     * 
     * @return Response
     */
    public function home(Request $request, Response $response, array $data)
    {
        // Return homepage
        return $this->view($response, 'home.twig');
    }
}
<?php

namespace App\Action;

use Slim\Http\Request;
use Slim\Http\Response;

class HealthAction implements Action
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        // IMPLEMENT YOUR HEALTHCHECK!

        return $response->write('OK');
    }
}

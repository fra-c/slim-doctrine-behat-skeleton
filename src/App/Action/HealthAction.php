<?php

namespace App\Action;

use App\HealthCheck\HealthCheckRepository;
use Slim\Http\Request;
use Slim\Http\Response;
use Throwable;

class HealthAction implements Action
{
    /**
     * @var HealthCheckRepository
     */
    private $healthCheckRepository;

    public function __construct(HealthCheckRepository $healthCheckRepository)
    {
        $this->healthCheckRepository = $healthCheckRepository;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $healthCheck = $this->healthCheckRepository->getHealthCheck();
        $healthCheck->update();

        try {
            $this->healthCheckRepository->save($healthCheck);
        } catch (Throwable $exception) {
            throw $exception;
        }

        return $response->write('OK');
    }
}

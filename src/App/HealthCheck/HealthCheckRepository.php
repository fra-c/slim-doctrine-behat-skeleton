<?php

namespace App\HealthCheck;

interface HealthCheckRepository
{
    public function save(HealthCheck $healthCheck): void;

    public function getHealthCheck(): HealthCheck;
}

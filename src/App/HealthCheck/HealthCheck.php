<?php

namespace App\HealthCheck;

use DateTimeImmutable;
use DateTimeInterface;

class HealthCheck
{
    private $id;
    private $lastCheckedAt;

    public function update(): void {
        $this->lastCheckedAt = new DateTimeImmutable();
    }

    public function getLastCheckedAt(): DateTimeInterface {
        return $this->lastCheckedAt;
    }
}

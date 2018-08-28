<?php

namespace Infrastructure\Repository;

use App\HealthCheck\HealthCheck;
use App\HealthCheck\HealthCheckRepository;
use Doctrine\ORM\EntityManager;

class DoctrineHealthCheckRepository implements HealthCheckRepository
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(HealthCheck $healthCheck): void
    {
        $this->entityManager->persist($healthCheck);
        $this->entityManager->flush();
    }

    public function getHealthCheck(): HealthCheck
    {
        $results = $this->entityManager->getRepository(HealthCheck::class)->findAll();

        if (empty($results)) {
            return new HealthCheck();
        }

        return $results[0];
    }
}

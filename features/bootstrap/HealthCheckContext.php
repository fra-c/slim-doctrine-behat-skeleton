<?php

use App\HealthCheck\HealthCheckRepository;
use Behat\Behat\Context\Context;
use PHPUnit\Framework\Assert;
use Slim\Http\Response;

class HealthCheckContext implements Context
{
    use AppTrait;
    use DatabaseTrait;

    /** @var Response */
    private $response;

    /**
     * @When I check the health of the service
     */
    public function iHitTheEndpoint()
    {
        $this->response = $this->request('GET', '/');
    }

    /**
     * @Then the service should be healthy
     */
    public function iShouldGetAResponseWithAStatus()
    {
        Assert::assertEquals(200, $this->response->getStatusCode());
    }
}

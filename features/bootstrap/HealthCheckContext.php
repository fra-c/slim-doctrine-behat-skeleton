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
     * @When I hit the :endpoint endpoint
     */
    public function iHitTheEndpoint($endpoint)
    {
        $this->response = $this->request('GET', $endpoint);
    }

    /**
     * @Then I should get a response with a :responseStatus status
     */
    public function iShouldGetAResponseWithAStatus($responseStatus)
    {
        Assert::assertEquals($responseStatus, $this->response->getStatusCode());
    }

    /**
     * @Then the healthcheck last checked date should be :when
     */
    public function theHealthcheckLastCheckedDateShouldBe($when)
    {
        Assert::assertEquals(
            $this->createApp()->getContainer()->get(HealthCheckRepository::class)->getHealthCheck()->getLastCheckedAt(),
            new DateTimeImmutable($when),
            "",
            2
        );
    }
}

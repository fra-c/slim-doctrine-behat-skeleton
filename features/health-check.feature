Feature: Healthcheck

  Scenario: Successful healthcheck
    When I check the health of the service
    Then the service should be healthy

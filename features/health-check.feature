Feature: Healthcheck

  Scenario: Successful healthcheck
    When I hit the "/health" endpoint
    Then I should get a response with a 200 status
    And the healthcheck last checked date should be "now"

Feature: Homepage
  Check home page rendering

  Scenario: try homepage
    Given I am on page "/"
    Then I should see "Welcome"

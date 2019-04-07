Feature: Homepage
  Check home page rendering

  Scenario: try homepage
    Given I am on "/"
    Then I should see "Hello World"

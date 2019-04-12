Feature: Login form
  
  Scenario: I try to login
    Given I am on page "/login"
    When I fill field "email" with "foo@bar.com"
    And I fill field "password" with "password"
    And I click "Sign in"
    Then I should see in current url "/admin/"

Feature: Admin client

  Scenario: List empty client list
    Given I am logged as "foo@bar.com" with password "password"
    And I am on page "/"
    Then I should see "No results found."
    And I should see "Add Client"

  Scenario: Go to add client page
    Given I am logged as "foo@bar.com" with password "password"
    And I am on page "/"
    When I click "Add Client"
    Then I should see "Create Client"

  Scenario: Add a client
    Given I am logged as "foo@bar.com" with password "password"
    And I am on page "/"
    When I click "Add Client"
    And I fill field "Name" with "My new client"
    And I click "Save changes"
    Then I should see "My new client"
    And I should not see "No results found."

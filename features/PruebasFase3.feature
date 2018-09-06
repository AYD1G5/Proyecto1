Feature: Usar un Login para poder ingresar al sistema
  In order to create a new shop
  As an admin
  I need to be able to add a new shop via create form.
Scenario: Create a new valid shop
  Given I am on "http://127.0.0.1:8000/login"
  When I fill in "email" with "willyslider@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
  Then I should see "CHOCOPENSUM"


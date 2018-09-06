Feature: Usar un Login para poder ingresar al sistema
Scenario: Ingresar a la pagina Login y no se ingresan los datos del usuario, 
          y solo se presiona el boton de ingresar
  Given I am on "http://127.0.0.1:8000/login"
  When I fill in "email" with ""
    And I fill in "password" with ""
    And I press "Login"
  Then I should see "Login"
  
Scenario: Ingresar a la pagina Login e ingresar password incorrecta, 
          por lo que nos debe dejar en la misma pagina
  Given I am on "http://127.0.0.1:8000/login"
  When I fill in "email" with "willyslider@gmail.com"
    And I fill in "password" with "1234"
    And I press "Login"
  Then I should see "Login"

Scenario: Ingresar a la pagina Login e ingresar email incorrecta, 
          por lo que nos debe dejar en la misma pagina
  Given I am on "http://127.0.0.1:8000/login"
  When I fill in "email" with "willyslider@.com"
    And I fill in "password" with "12345678"
    And I press "Login"
  Then I should see "Login"


Scenario: Ingresar a la pagina Login e ingresar credeciales correctas, 
          por lo que nos debe redireccionar a la pagina de Primer Semestre
  Given I am on "http://127.0.0.1:8000/login"
  When I fill in "email" with "willyslider@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
  Then I should see "1 SEMESTRE"






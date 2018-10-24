Feature: BLOQUEAR USUARIO
    Como usuario quisiera bloqeuar y desbloquear usuarios a mi eleccion, dentro de una lista de usuarios


Scenario: Ingresar a la pagina Login e ingresar password correcta con usuario correcto, 
          Y ver el listado de usuarios
    Given there is a user with email: "willyslider@gmail.com" And password: "12345678"
    When I am on "http://127.0.0.1:8000/login"
    And I fill in "email" with "willyslider@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
    And I am on "http://127.0.0.1:8000/cursosporsemestre/1/semestre"
  When I am on "http://127.0.0.1:8000/ListarUsuarios2"
Then I should see "USUARIOS"

Scenario: Ingresar a la pagina Login e ingresar password correcta con usuario correcto, 
          Y ver el listado de usuarios y bloquear un usuario
    Given there is a user with email: "willyslider@gmail.com" And password: "12345678"
    When I am on "http://127.0.0.1:8000/login"
    And I fill in "email" with "willyslider@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
    And I am on "http://127.0.0.1:8000/cursosporsemestre/1/semestre"
    And I am on "http://127.0.0.1:8000/ListarUsuarios2"
  When I follow "Bloquear Usuario"
Then I should see "Desloquear Usuario"

Scenario: Ingresar a la pagina Login e ingresar password correcta con usuario correcto, 
          Y ver el listado de usuarios y bloquear un usuario
    Given there is a user with email: "willyslider@gmail.com" And password: "12345678"
    When I am on "http://127.0.0.1:8000/login"
    And I fill in "email" with "willyslider@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
    And I am on "http://127.0.0.1:8000/cursosporsemestre/1/semestre"
    And I am on "http://127.0.0.1:8000/ListarUsuarios2"
  When I follow "Desloquear Usuario"
Then I should see "Bloquear Usuario"
Feature: REPORTE DE CURSOS GANADOS
    Como Estudiante
    Quisiera  contar con un reporte que me muestre todos los cursos Ganados por carrera
    Para disponer de la cantidad de créditos obtenidos, y poder analizar mi avance en la carrera.


Scenario: Ingresar a la pagina Login e ingresar password correcta con usuario correcto, 
          mientras estoy en la pagina de cursos por semestre, quiero presionar un link,
          para navegar y ver mi reporte de cursos ganados  
Given there is a user with email: "willyslider@gmail.com" And password: "12345678"
    And I am on "http://127.0.0.1:8000/eliminarasignacion"
    When I am on "http://127.0.0.1:8000/login"
    And I fill in "email" with "willyslider@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
    And I am on "http://127.0.0.1:8000/cursosporsemestre/1/semestre"
  When I follow "Prueba"
  Then I should be on "http://127.0.0.1:8000/ReporteCursosGanados"


Scenario: Ingresar a la pagina de cursos aprogados y si el usuario no tiene ningun curso aprobado, 
          debe de mostrar un mensaje donde indique que tiene 0 cursos aprobados
Given there is a user with email: "willyslider@gmail.com" And password: "12345678"
    And I am on "http://127.0.0.1:8000/login"
    And I fill in "email" with "willyslider@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
    And I am on "http://127.0.0.1:8000/cursosporsemestre/1/semestre"
  When I follow "Prueba"
  Then I should see "Cursos Ganados: 0"

  Scenario: Ingresar a la pagina de cursos aprogados y si el usuario no tienen ningun curso aprobado, 
            debe de mostrar un mensaje donde indique no tiene una cantidad de 0 creditos 
Given there is a user with email: "willyslider@gmail.com" And password: "12345678"
    And I am on "http://127.0.0.1:8000/login"
    And I fill in "email" with "willyslider@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
    And I am on "http://127.0.0.1:8000/cursosporsemestre/1/semestre"
  When I follow "Prueba"
  Then I should see "Creditos: 0"
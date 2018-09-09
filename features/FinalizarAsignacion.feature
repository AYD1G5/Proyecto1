Feature: Finalizar Asignacion
    Como usuario
    Quiero ingresar las notas de mis cursos
    Para actualizar el estado de mi carrera y poder ver que cursos nuevos desbloqueados tengo.


Scenario: En la pagina de cursos por semestre, despues de hacer click en el boton de asignar de un 
          curso desbloqueado, me debe redireccionar a una pagina donde debo escoger el catedratico 
          con el que quiero llevarlo, al hacer click en guardar y cambiando a la pagina de finalizar asignacion,
          el curso debe aparecer en esta pagina, listo para ponerle nota, despues de poner nota de 60 
          el curso no me debe aparecer todavia como ganado.
  Given I am on "http://127.0.0.1:8000/login"
    And I fill in "email" with "willyslider@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
    And I am on "http://127.0.0.1:8000/cursosporsemestre/2/semestre"
    And I follow "asignar2"
    And I press "Guardar"
    And I am on "http://127.0.0.1:8000/finalizarasignacion/"
    When I fill in "nota" with "60" 
    And I press "actualizarnota"  
    And I press "finalizarasignacion"  
    And I am on "http://127.0.0.1:8000/cursosporsemestre/2/semestre"
    Then I should not see "GANADO"


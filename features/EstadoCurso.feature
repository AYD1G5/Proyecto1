Feature: Estado Curso
    Como estudiante  Quiero identificar de manera visual cual es el estado de los cursos 
    de una carrera especifica en respecto al avance de mi carrera Para identificar facilmente
    cuales son los cursos desbloqueados, aprobados o no desbloqueados.


Scenario: Estando en la pagina de cursos por semestre, despues de hacer click en el boton de asignar 
          de un curso que tengo desbloqueado, me debe redireccionar a una 
          pagina donde debo escoger el catedratico con el que quiero llevarlo, al hacer click en guardar, 
          en la fila del curso debe desaparecer el boton asignar.
  Given I am on "http://127.0.0.1:8000/login"
    And I fill in "email" with "willyslider@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
    And I am on "http://127.0.0.1:8000/cursosporsemestre/1/semestre"
    And I follow "asignar6"
    And I press "Guardar"
    Then I should not see "asignar6" 


Scenario: Estando en la pagina de cursos por semestre, despues de hacer click en el boton de asignar de un curso
         que tengo desbloqueado, me debe redireccionar a una pagina donde debo escoger 
         el catedratico con el que quiero llevarlo, al hacer click en guardar el curso debe
         cambiar su estado a asignado.
  Given I am on "http://127.0.0.1:8000/login"
    And I fill in "email" with "willyslider@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
    And I am on "http://127.0.0.1:8000/cursosporsemestre/1/semestre"
    And I follow "asignar7"
    And I press "Guardar"
    And I follow "revisarasignacion"
    Then I should see "Idioma tecnico 1"


Scenario: Estando en la pagina del segundo semestre, dado que tengo un curso asignado, 
          despues de hacer click en el boton de desasignar que aparece en el curso,
          el curso debe cambiar de asignado a desbloqueado.
  Given I am on "http://127.0.0.1:8000/login"
    And I fill in "email" with "willyslider@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
    And I am on "http://127.0.0.1:8000/cursosporsemestre/2/semestre"
    And I follow "asignar2"
    And I press "Guardar"
    And I am on "http://127.0.0.1:8000/cursosporsemestre/2/semestre"
    And I follow "desasignar2"
    Then I should see "DESBLOQUEADO"


Scenario: Estando en la pagina de revision de cursos asignados, con un curso ya asignado,
          despues de hacer click en el boton de desasignar que aparece en el curso,
          el curso debe desaparecer de la pagina.
  Given I am on "http://127.0.0.1:8000/login"
    And I fill in "email" with "willyslider@gmail.com"
    And I fill in "password" with "12345678"
    And I press "Login"
    And I am on "http://127.0.0.1:8000/cursosporsemestre/2/semestre"
    And I follow "asignar2"
    And I press "Guardar"
    And I am on "http://127.0.0.1:8000/revisarasignacion/1"
    And I follow "desasignar2"
    And I follow "revisarasignacion"
    Then I should not see "Matematica Basica 2"
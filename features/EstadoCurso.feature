Feature: Estado Curso
    Como estudiante  Quiero identificar de manera visual cual es el estado de los cursos 
    de una carrera especifica en respecto al avance de mi carrera Para identificar facilmente
    cuales son los cursos desbloqueados, aprobados o no desbloqueados.

    Scenario: Estando con un usuario autenticado en la plataforma
      estando en la pagina de listado de los cursos de primer Semestre
      y me quiero asignar un cursos que no tiene pre requisitos pendientes tambien
      que su restriccion sea cumplida y se encuentre en estado desbloqueado.

    Given there is a user with email: "willyslider@gmail.com" And password: 12345678
      And I am on "http://127.0.0.1:8000/login"
      And I fill in "email" with "willyslider@gmail.com"
      And I fill in "password" with "12345678"
      And I press "Login"
      And I am on "http://127.0.0.1:8000/cursosporsemestre/1/semestre"
    When I follow "Prueba"
    Then I should be on "http://127.0.0.1:8000/ReporteCursosGanados"

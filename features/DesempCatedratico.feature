Feature: Encuesta de desempenio academico de los catedratico
    Como estudiante quisiera que me mostrara el sistema las calificaciones que los demas usuarios
    han realizado a los catedraticos de cada cursos para determinar si es viable asignarme un curso
    con ese catedratico o debo de elegir a otro con mejores metodos de enseñanza.

    Scenario: Como estudiante registrado a la aplicacion chocopensumX, deseo calificar el metodo de enseñanza que
              los catedraticos aplican en los cursos que imparten, para que de esta manera podamos dejar un historial
              por cada estudiante sobre que nos parece el metodo que este aplica, cabe destacar que cada catedratico puede
              impartir mas de un curso por lo tanto quisiera calificarle en base al curso que me haya asignado
              y de esta manera enfocarnos en el curso y no generalizar con el catedratico debido a que puede que tenga
              mas conocimientos sobre un curso que en otro.

    Given there is a user with email: "willyslider@gmail.com" And password: 12345678
      And I am on "http://127.0.0.1:8000/login"
      And I fill in "email" with "willyslider@gmail.com"
      And I fill in "password" with "12345678"
      And I press "Login"
      And I am on "http://127.0.0.1:8000/encuesta/1/1"
      And I press "Send your message"
      Then I should be on "http://127.0.0.1:8000/encuesta/1/1"

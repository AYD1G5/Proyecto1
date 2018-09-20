use proyectoayd1;    
insert into rol(nombre_rol) values  ('docente');
insert into rol(nombre_rol) values  ('estudiante');

insert into escuela(codigo_escuela, nombre_escuela) values  (1, 'Ciencias');
insert into escuela(codigo_escuela, nombre_escuela) values  (2, 'Ciencias y Sistemas');
insert into escuela(codigo_escuela, nombre_escuela) values  (3, 'Industrial');

insert into area(codigo_area, nombre_area) values  (1, 'Matematica');
insert into area(codigo_area, nombre_area) values  (2, 'Fisica');
insert into area(codigo_area, nombre_area) values  (3, 'Social HUmanistica');

insert into ciclo(codigo_ciclo, nombre_ciclo) values (1, 'primer semestre');
insert into ciclo(codigo_ciclo, nombre_ciclo) values (2, 'segundo semestre');

insert into carrera(codigo_carrera, nombre_carrera) values  (1, 'Ciencias y Sistemas');
insert into carrera(codigo_carrera, nombre_carrera) values  (2, 'Civil');
insert into carrera(codigo_carrera, nombre_carrera) values  (3, 'Industrial');

insert into pensum(codigo_pensum, nombre_pensum, id_carrera) values  (1, '2008-Ciencias y Sistemas', 1);
insert into pensum(codigo_pensum, nombre_pensum, id_carrera) values  (2, '2007-Civil', 2);
insert into pensum(codigo_pensum, nombre_pensum, id_carrera) values  (3, '2007-Industrial', 2);


insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (1, 'Matematica Basica 1', 1, 1);
insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (2, 'Matematica Basica 2', 1, 1);
insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (3, 'Matematica Intermedia 1', 1, 1);
insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (4, 'Matematica Intermedia 2', 1, 1);
insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (5, 'Matematica Intermedia 3', 1, 1);
insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (6, 'Social Humanistica', 1, 3);
insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (7, 'Idioma tecnico 1', 1, 3);
insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (8, 'Idioma tecnico 2', 1, 3);
insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (9, 'Idioma tecnico 3', 1, 3);
insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (10, 'Idioma tecnico 4', 1, 3);
insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (11, 'Matematica Aplicada 1', 1, 3);
insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (12, 'Matematica Aplicada 3', 1, 3);

insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (1, 1, 'Obligatorio', 5, 'Si', 0, 1);
insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (2, 1, 'Obligatorio', 5, 'Si', 0, 2);
insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (3, 1, 'Obligatorio', 5, 'Si', 0, 3);
insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (4, 1, 'Obligatorio', 5, 'Si', 0, 4);
insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (5, 1, 'Obligatorio', 5, 'Si', 0, 4);
insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (6, 1, 'Obligatorio', 5, 'Si', 0, 1);
insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (7, 1, 'Obligatorio', 5, 'Si', 0, 1);
insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (8, 1, 'Obligatorio', 5, 'Si', 0, 2);
insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (9, 1, 'Obligatorio', 5, 'Si', 0, 3);
insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (10, 1, 'Obligatorio', 5, 'Si', 0, 4);
insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (11, 1, 'Obligatorio', 5, 'Si', 0, 5);
insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (12, 1, 'Obligatorio', 5, 'Si', 0, 5);

insert into users(registro_academico, nombre, apellido, id_rol, direccion, email, password) 
	values ('201503666', 'Miguel Angel', 'Ruano Roca', 1, 'San Martin Jilotepeque', 'miguelruano35@gmail.com', '$2y$10$DpggUBPOq89wX7FbLN7HuOU4W1twl7Diz1hiypGYBnpMxP/1lzGPu');
insert into users(registro_academico, nombre, apellido, id_rol, direccion, email, password) 
	values ('201504480', 'Denilson', 'Argueta', 1, 'San Martin Jilotepeque', 'denilson3@gmail.com', '$2y$10$DpggUBPOq89wX7FbLN7HuOU4W1twl7Diz1hiypGYBnpMxP/1lzGPu');

insert into curso_catedratico(id_curso_pensum, id_catedratico) values (1, 1);
insert into curso_catedratico(id_curso_pensum, id_catedratico) values (2, 1);
insert into curso_catedratico(id_curso_pensum, id_catedratico) values (3, 1);
insert into curso_catedratico(id_curso_pensum, id_catedratico) values (4, 1);
insert into curso_catedratico(id_curso_pensum, id_catedratico) values (5, 1);
insert into curso_catedratico(id_curso_pensum, id_catedratico) values (6, 1);
insert into curso_catedratico(id_curso_pensum, id_catedratico) values (1, 2);
insert into curso_catedratico(id_curso_pensum, id_catedratico) values (2, 2);
insert into curso_catedratico(id_curso_pensum, id_catedratico) values (3, 2);
insert into curso_catedratico(id_curso_pensum, id_catedratico) values (4, 2);
insert into curso_catedratico(id_curso_pensum, id_catedratico) values (5, 2);
insert into curso_catedratico(id_curso_pensum, id_catedratico) values (6, 2);
insert into curso_catedratico(id_curso_pensum, id_catedratico) values (7, 2);
insert into curso_catedratico(id_curso_pensum, id_catedratico) values (8, 2);
insert into curso_catedratico(id_curso_pensum, id_catedratico) values (9, 2);
insert into curso_catedratico(id_curso_pensum, id_catedratico) values (10, 2);
insert into curso_catedratico(id_curso_pensum, id_catedratico) values (11, 2);
insert into curso_catedratico(id_curso_pensum, id_catedratico) values (12, 2);

insert into curso_prerequisito(id_curso_pensum, id_curso) values (2, 1);
insert into curso_prerequisito(id_curso_pensum, id_curso) values (3, 2);
insert into curso_prerequisito(id_curso_pensum, id_curso) values (4, 3);
insert into curso_prerequisito(id_curso_pensum, id_curso) values (5, 3);
insert into curso_prerequisito(id_curso_pensum, id_curso) values (8, 7);
insert into curso_prerequisito(id_curso_pensum, id_curso) values (9, 8);
insert into curso_prerequisito(id_curso_pensum, id_curso) values (10, 9);
insert into curso_prerequisito(id_curso_pensum, id_curso) values (11, 4);
insert into curso_prerequisito(id_curso_pensum, id_curso) values (11, 5);
insert into curso_prerequisito(id_curso_pensum, id_curso) values (12, 4);
insert into curso_prerequisito(id_curso_pensum, id_curso) values (12, 5);


-- crear un usuario con la pagina

use proyectoayd1;   
insert into asignacion(id_estudiante, id_ciclo, anio) values (3, 1, 2018);

insert into curso_asignacion(id_curso_pensum, nota, id_asignacion, id_catedratico) values (1, 61, 1, 1);
insert into curso_asignacion(id_curso_pensum, nota, id_asignacion, id_catedratico) values (6, 70, 1, 1);
insert into curso_asignacion(id_curso_pensum, nota, id_asignacion, id_catedratico) values (7, 64, 1, 1);

insert into asignacion(id_estudiante, id_ciclo, anio) values (3, 1, 2018);
insert into curso_asignacion(id_curso_pensum, nota, id_asignacion, id_catedratico) values (1, 60, 2, 1);
insert into curso_asignacion(id_curso_pensum, nota, id_asignacion, id_catedratico) values (6, 70, 2, 1);
insert into curso_asignacion(id_curso_pensum, nota, id_asignacion, id_catedratico) values (7, 30, 2, 1);
insert into curso_asignacion(id_curso_pensum, nota, id_asignacion, id_catedratico) values (4, 46, 2, 1);
insert into curso_asignacion(id_curso_pensum, nota, id_asignacion, id_catedratico) values (5, 45, 2, 1);

insert into curso_asignacion(id_curso_pensum, nota, id_asignacion, id_catedratico) values (4, 61, 2, 1);
insert into curso_asignacion(id_curso_pensum, nota, id_asignacion, id_catedratico) values (5, 83, 2, 1);

select * from curso_pensum;
select * from pensum;
select * from pensum_estudiante;
select * from users;
select * from ciclo;
select * from curso_catedratico;
select * from asignacion_temporal;
select * from asignacion;
select * from curso_asignacion_temporal;
select * from `curso_asignacion_temporal` as `ctmp` where `ctmp`.`id_codigo_pensum` = 1;







--Script Willy
use proyectoayd1;   
insert into Grupo(id_Creador_Grupo, nombre) values (3,'Grupo1');
insert into estudiante_Grupo(id_Estudiante, id_Grupo) values (3,'1');
insert into Tema_Grupo(id_CreadorTema, id_Grupo,Titulo,Texto) values (3,'1','Tema1','Esta es una prueba de un tema');

insert into comentario_Grupo(id_Tema_Grupo, id_estudiante,Texto) values (1,'2','Esta es una prueba de un comentario');


insert into Grupo(id_Creador_Grupo, nombre) values (3,'Grupo2');
insert into Grupo(id_Creador_Grupo, nombre) values (3,'Grupo3');
insert into Grupo(id_Creador_Grupo, nombre) values (3,'Grupo4');
insert into Grupo(id_Creador_Grupo, nombre) values (3,'Grupo5');
insert into Grupo(id_Creador_Grupo, nombre) values (3,'Grupo6');
insert into Grupo(id_Creador_Grupo, nombre) values (3,'Grupo7');


insert into estudiante_Grupo(id_Estudiante, id_Grupo) values (3,'2');
insert into estudiante_Grupo(id_Estudiante, id_Grupo) values (3,'3');
insert into estudiante_Grupo(id_Estudiante, id_Grupo) values (3,'4');
insert into estudiante_Grupo(id_Estudiante, id_Grupo) values (3,'5');
insert into estudiante_Grupo(id_Estudiante, id_Grupo) values (3,'6');
insert into estudiante_Grupo(id_Estudiante, id_Grupo) values (3,'7');

insert into Tema_Grupo(id_CreadorTema, id_Grupo,Titulo,Texto) values (3,'1','Tema2','Esta es una prueba de un tema 2 grupo 1');
insert into Tema_Grupo(id_CreadorTema, id_Grupo,Titulo,Texto) values (3,'1','Tema3','Esta es una prueba de un tema 3 grupo 1');
insert into Tema_Grupo(id_CreadorTema, id_Grupo,Titulo,Texto) values (3,'1','Tema4','Esta es una prueba de un tema 4 grupo 1');
insert into Tema_Grupo(id_CreadorTema, id_Grupo,Titulo,Texto) values (3,'1','Tema5','Esta es una prueba de un tema 5 grupo 1');
insert into Tema_Grupo(id_CreadorTema, id_Grupo,Titulo,Texto) values (3,'1','Tema6','Esta es una prueba de un tema 6 grupo 1');
insert into Tema_Grupo(id_CreadorTema, id_Grupo,Titulo,Texto) values (3,'1','Tema7','Esta es una prueba de un tema 7 grupo 1');


insert into comentario_Grupo(id_Tema_Grupo, id_estudiante,Texto) values (1,'2','Esta es una prueba de un comentario 2 tema 1 grupo 1');
insert into comentario_Grupo(id_Tema_Grupo, id_estudiante,Texto) values (1,'2','Esta es una prueba de un comentario 3 tema 1 grupo 1');
insert into comentario_Grupo(id_Tema_Grupo, id_estudiante,Texto) values (1,'1','Esta es una prueba de un comentario 4 tema 1 grupo 1');
insert into comentario_Grupo(id_Tema_Grupo, id_estudiante,Texto) values (1,'2','Esta es una prueba de un comentario 5 tema 1 grupo 1');
insert into comentario_Grupo(id_Tema_Grupo, id_estudiante,Texto) values (1,'3','Esta es una prueba de un comentario 6 tema 1 grupo 1');
insert into comentario_Grupo(id_Tema_Grupo, id_estudiante,Texto) values (1,'3','Esta es una prueba de un comentario 7 tema 1 grupo 1');


use proyectoayd1;   
insert into AppExterna(nombre, ruta, descripcion, linkexterno) values ('Messenger','/img/AppExt_Messenger.png', 'Envíanos un mensaje de Facebook', 'https://m.me/XYZ');
insert into AppExterna(nombre, ruta, descripcion, linkexterno) values ('WhatsApp','/img/AppExt_WhatsApp.png', 'Envíanos un mensaje de WhatsApp', 'https://api.whatsapp.com/send?phone=');
insert into AppExterna(nombre, ruta, descripcion, linkexterno) values ('Google Calendario','/img/AppExt_Calendario.png', 'Calendario de Google', 'https://calendar.google.com/calendar/embed?src=ojsqf8dgos16kcrjbum79rhv0g%40group.calendar.google.com&ctz=America%2FGuatemala');
insert into AppExterna(nombre, ruta, descripcion, linkexterno) values ('TokBox','/img/AppExt3_TokBox.png', 'Ingresa al VideoChat', '/AppExterna/Videochat');



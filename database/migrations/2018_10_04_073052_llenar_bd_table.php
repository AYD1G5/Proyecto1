<?php

use App\User;
use App\Pensum;
use App\Asignacion_temporal;
use App\Pensum_estudiante;
use App\Rol;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LlenarBdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function agregarUsuario($registro_academico, $nombre, $apellido, $email, $id_rol, $direccion, $password, $pensum_estudiante){
        $salida = User::create([
            'registro_academico' => $registro_academico,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'id_rol' => $id_rol,
            'direccion' => $direccion,      
            'password' => Hash::make($password),
        ]);
        if(!$salida->errors){
            Pensum_estudiante::create([
                'id_pensum' => $pensum_estudiante,
                'id_estudiante' =>$salida->id,
            ]);
            Asignacion_temporal::create([
                'id_pensum' => $pensum_estudiante,
                'id_estudiante' =>$salida->id,
            ]);
        }
        return $salida;
    }

    public function up()
    {   
        DB::insert("insert into rol(nombre_rol) values  ('docente')");
        DB::insert("insert into rol(nombre_rol) values  ('estudiante')");
        DB::insert("insert into escuela(codigo_escuela, nombre_escuela) values  (1, 'Ciencias')");
        DB::insert("insert into escuela(codigo_escuela, nombre_escuela) values  (2, 'Ciencias y Sistemas')");
        DB::insert("insert into escuela(codigo_escuela, nombre_escuela) values  (3, 'Industrial')");
        DB::insert("insert into area(codigo_area, nombre_area) values  (1, 'Matematica')");
        DB::insert("insert into area(codigo_area, nombre_area) values  (2, 'Fisica')");
        DB::insert("insert into area(codigo_area, nombre_area) values  (3, 'Social HUmanistica')");        
        DB::insert("insert into ciclo(codigo_ciclo, nombre_ciclo) values (1, 'primer semestre')");
        DB::insert("insert into ciclo(codigo_ciclo, nombre_ciclo) values (2, 'segundo semestre')");
        DB::insert("insert into carrera(codigo_carrera, nombre_carrera) values  (1, 'Ciencias y Sistemas')");
        DB::insert("insert into carrera(codigo_carrera, nombre_carrera) values  (2, 'Civil')");
        DB::insert("insert into carrera(codigo_carrera, nombre_carrera) values  (3, 'Industrial')");
        DB::insert("insert into pensum(codigo_pensum, nombre_pensum, id_carrera) values  (1, '2008-Ciencias y Sistemas', 1)");
        DB::insert("insert into pensum(codigo_pensum, nombre_pensum, id_carrera) values  (2, '2007-Civil', 2)");
        DB::insert("insert into pensum(codigo_pensum, nombre_pensum, id_carrera) values  (3, '2007-Industrial', 2)");
        DB::insert("insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (1, 'Matematica Basica 1', 1, 1)");
        DB::insert("insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (2, 'Matematica Basica 2', 1, 1)");
        DB::insert("insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (3, 'Matematica Intermedia 1', 1, 1)");
        DB::insert("insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (4, 'Matematica Intermedia 2', 1, 1)");
        DB::insert("insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (5, 'Matematica Intermedia 3', 1, 1)");
        DB::insert("insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (6, 'Social Humanistica', 1, 3)");
        DB::insert("insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (7, 'Idioma tecnico 1', 1, 3)");
        DB::insert("insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (8, 'Idioma tecnico 2', 1, 3)");
        DB::insert("insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (9, 'Idioma tecnico 3', 1, 3)");
        DB::insert("insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (10, 'Idioma tecnico 4', 1, 3)");
        DB::insert("insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (11, 'Matematica Aplicada 1', 1, 3)");
        DB::insert("insert into curso(codigo_curso, nombre_curso, id_escuela, id_area) values (12, 'Matematica Aplicada 3', 1, 3)");
        DB::insert("insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (1, 1, 'Obligatorio', 5, 'Si', 0, 1)");
        DB::insert("insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (2, 1, 'Obligatorio', 5, 'Si', 0, 2)");
        DB::insert("insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (3, 1, 'Obligatorio', 5, 'Si', 0, 3)");
        DB::insert("insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (4, 1, 'Obligatorio', 5, 'Si', 0, 4)");
        DB::insert("insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (5, 1, 'Obligatorio', 5, 'Si', 0, 4)");
        DB::insert("insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (6, 1, 'Obligatorio', 5, 'Si', 0, 1)");
        DB::insert("insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (7, 1, 'Obligatorio', 5, 'Si', 0, 1)");
        DB::insert("insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (8, 1, 'Obligatorio', 5, 'Si', 0, 2)");
        DB::insert("insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (9, 1, 'Obligatorio', 5, 'Si', 0, 3)");
        DB::insert("insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (10, 1, 'Obligatorio', 5, 'Si', 0, 4)");
        DB::insert("insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (11, 1, 'Obligatorio', 5, 'Si', 0, 5)");
        DB::insert("insert into curso_pensum(id_curso, id_pensum, categoria, creditos, laboratorioboolean, restriccion, semestre) values (12, 1, 'Obligatorio', 5, 'Si', 0, 5)");
        $this->agregarUsuario('201503666', 'Miguel Angel', 'Ruano Roca', 'miguelruano35@gmail.com', '1', 'San Martin Jilotepeque', '12345678', '1');
        $this->agregarUsuario('201504480', 'Denilson', 'Argueta', 'denilson3@gmail.com', '1', 'Guatemala', '12345678', '1');
        $this->agregarUsuario('201504483', 'Lic. Willy', 'Lopez', 'willyslider@gmail.com', '1', 'Guatemala', '12345678', '1');
        $this->agregarUsuario('201504489', 'Elmer', 'Real', 'elmerreal2@gmail.com', '1', 'Guatemala', '12345678', '1');
        DB::insert("insert into curso_catedratico(id_curso_pensum, id_catedratico) values (1, 1)");
        DB::insert("insert into curso_catedratico(id_curso_pensum, id_catedratico) values (2, 1)");
        DB::insert("insert into curso_catedratico(id_curso_pensum, id_catedratico) values (3, 1)");
        DB::insert("insert into curso_catedratico(id_curso_pensum, id_catedratico) values (4, 1)");
        DB::insert("insert into curso_catedratico(id_curso_pensum, id_catedratico) values (5, 1)");
        DB::insert("insert into curso_catedratico(id_curso_pensum, id_catedratico) values (6, 1)");
        DB::insert("insert into curso_catedratico(id_curso_pensum, id_catedratico) values (1, 2)");
        DB::insert("insert into curso_catedratico(id_curso_pensum, id_catedratico) values (2, 2)");
        DB::insert("insert into curso_catedratico(id_curso_pensum, id_catedratico) values (3, 2)");
        DB::insert("insert into curso_catedratico(id_curso_pensum, id_catedratico) values (4, 2)");
        DB::insert("insert into curso_catedratico(id_curso_pensum, id_catedratico) values (5, 2)");
        DB::insert("insert into curso_catedratico(id_curso_pensum, id_catedratico) values (6, 2)");
        DB::insert("insert into curso_catedratico(id_curso_pensum, id_catedratico) values (7, 2)");
        DB::insert("insert into curso_catedratico(id_curso_pensum, id_catedratico) values (8, 2)");
        DB::insert("insert into curso_catedratico(id_curso_pensum, id_catedratico) values (9, 2)");
        DB::insert("insert into curso_catedratico(id_curso_pensum, id_catedratico) values (10, 2)");
        DB::insert("insert into curso_catedratico(id_curso_pensum, id_catedratico) values (11, 2)");
        DB::insert("insert into curso_catedratico(id_curso_pensum, id_catedratico) values (12, 2)");
        DB::insert("insert into curso_prerequisito(id_curso_pensum, id_curso) values (2, 1)");
        DB::insert("insert into curso_prerequisito(id_curso_pensum, id_curso) values (3, 2)");
        DB::insert("insert into curso_prerequisito(id_curso_pensum, id_curso) values (4, 3)");
        DB::insert("insert into curso_prerequisito(id_curso_pensum, id_curso) values (5, 3)");
        DB::insert("insert into curso_prerequisito(id_curso_pensum, id_curso) values (8, 7)");
        DB::insert("insert into curso_prerequisito(id_curso_pensum, id_curso) values (9, 8)");
        DB::insert("insert into curso_prerequisito(id_curso_pensum, id_curso) values (10, 9)");
        DB::insert("insert into curso_prerequisito(id_curso_pensum, id_curso) values (11, 4)");
        DB::insert("insert into curso_prerequisito(id_curso_pensum, id_curso) values (11, 5)");
        DB::insert("insert into curso_prerequisito(id_curso_pensum, id_curso) values (12, 4)");
        DB::insert("insert into curso_prerequisito(id_curso_pensum, id_curso) values (12, 5)");
        DB::insert("insert into Grupo(id_Creador_Grupo, nombre) values (3,'Grupo1')");
        DB::insert("insert into estudiante_Grupo(id_Estudiante, id_Grupo) values (3,'1')");
        DB::insert("insert into Tema_Grupo(id_CreadorTema, id_Grupo,Titulo,Texto) values (3,'1','Tema1','Esta es una prueba de un tema')");
        DB::insert("insert into comentario_Grupo(id_Tema_Grupo, id_estudiante,Texto) values (1,'2','Esta es una prueba de un comentario')");
        DB::insert("insert into Grupo(id_Creador_Grupo, nombre) values (3,'Grupo2')");
        DB::insert("insert into Grupo(id_Creador_Grupo, nombre) values (3,'Grupo3')");
        DB::insert("insert into Grupo(id_Creador_Grupo, nombre) values (3,'Grupo4')");
        DB::insert("insert into Grupo(id_Creador_Grupo, nombre) values (3,'Grupo5')");
        DB::insert("insert into Grupo(id_Creador_Grupo, nombre) values (3,'Grupo6')");
        DB::insert("insert into Grupo(id_Creador_Grupo, nombre) values (3,'Grupo7')");
        DB::insert("insert into estudiante_Grupo(id_Estudiante, id_Grupo) values (3,'2')");
        DB::insert("insert into estudiante_Grupo(id_Estudiante, id_Grupo) values (3,'3')");
        DB::insert("insert into estudiante_Grupo(id_Estudiante, id_Grupo) values (3,'4')");
        DB::insert("insert into estudiante_Grupo(id_Estudiante, id_Grupo) values (3,'5')");
        DB::insert("insert into estudiante_Grupo(id_Estudiante, id_Grupo) values (3,'6')");
        DB::insert("insert into estudiante_Grupo(id_Estudiante, id_Grupo) values (3,'7')");
        DB::insert("insert into Tema_Grupo(id_CreadorTema, id_Grupo,Titulo,Texto) values (3,'1','Tema2','Esta es una prueba de un tema 2 grupo 1')");
        DB::insert("insert into Tema_Grupo(id_CreadorTema, id_Grupo,Titulo,Texto) values (3,'1','Tema3','Esta es una prueba de un tema 3 grupo 1')");
        DB::insert("insert into Tema_Grupo(id_CreadorTema, id_Grupo,Titulo,Texto) values (3,'1','Tema4','Esta es una prueba de un tema 4 grupo 1')");
        DB::insert("insert into Tema_Grupo(id_CreadorTema, id_Grupo,Titulo,Texto) values (3,'1','Tema5','Esta es una prueba de un tema 5 grupo 1')");
        DB::insert("insert into Tema_Grupo(id_CreadorTema, id_Grupo,Titulo,Texto) values (3,'1','Tema6','Esta es una prueba de un tema 6 grupo 1')");
        DB::insert("insert into Tema_Grupo(id_CreadorTema, id_Grupo,Titulo,Texto) values (3,'1','Tema7','Esta es una prueba de un tema 7 grupo 1')");
        DB::insert("insert into comentario_Grupo(id_Tema_Grupo, id_estudiante,Texto) values (1,'2','Esta es una prueba de un comentario 2 tema 1 grupo 1')");
        DB::insert("insert into comentario_Grupo(id_Tema_Grupo, id_estudiante,Texto) values (1,'2','Esta es una prueba de un comentario 3 tema 1 grupo 1')");
        DB::insert("insert into comentario_Grupo(id_Tema_Grupo, id_estudiante,Texto) values (1,'1','Esta es una prueba de un comentario 4 tema 1 grupo 1')");
        DB::insert("insert into comentario_Grupo(id_Tema_Grupo, id_estudiante,Texto) values (1,'2','Esta es una prueba de un comentario 5 tema 1 grupo 1')");
        DB::insert("insert into comentario_Grupo(id_Tema_Grupo, id_estudiante,Texto) values (1,'3','Esta es una prueba de un comentario 6 tema 1 grupo 1')");
        DB::insert("insert into comentario_Grupo(id_Tema_Grupo, id_estudiante,Texto) values (1,'3','Esta es una prueba de un comentario 7 tema 1 grupo 1')");
        DB::insert("insert into messages(id, body, user_id) values (1, 'Mensaje', 3)");
        DB::insert("insert into material(nombre_archivo, extension_archivo, ruta_real_archivo, tamano_archivo, descripcion_archivo) values ('201503666_Tarea3.pdf', 'pdf', 'materialSubido/2018/09/201503666_Tarea3.pdf', 	
        619818, 'Tarea 201503666')");
        DB::insert("insert into material_curso(id_curso_pensum, id_material) values (1, 1)");
        DB::insert("insert into asignacion(id_estudiante, id_ciclo, anio) values (1, 1, 2018)");
        DB::insert("insert into curso_asignacion(id_curso_pensum, nota, id_asignacion, id_catedratico) values (1, 61, 1, 1)");
        DB::insert("insert into curso_asignacion(id_curso_pensum, nota, id_asignacion, id_catedratico) values (6, 70, 1, 1)");
        DB::insert("insert into curso_asignacion(id_curso_pensum, nota, id_asignacion, id_catedratico) values (7, 64, 1, 1)");
        DB::insert("insert into temas(tema, nombre_tema, descripcion, creador_id, curso_id) values (1, 'tema1', 'tema1', 3, 1)");
        DB::insert("insert into comentariotemas(comentariotema_id, user_id, tema_id, comentario) values (1, 1, 1, 'Esto es un comentario')");

        // APP EXTERNA
        DB::insert("insert into AppExterna(nombre, ruta, descripcion, linkexterno) values ('Messenger','/img/AppExt_Messenger.png', 'Envíanos un mensaje de Facebook', 'https://m.me/XYZ')");
        DB::insert("insert into AppExterna(nombre, ruta, descripcion, linkexterno) values ('WhatsApp','/img/AppExt_WhatsApp.png', 'Envíanos un mensaje de WhatsApp', 'https://api.whatsapp.com/send?phone=')");
        DB::insert("insert into AppExterna(nombre, ruta, descripcion, linkexterno) values ('Google Calendario','/img/AppExt_Calendario.png', 'Calendario de Google', 'https://calendar.google.com/calendar/embed?src=ojsqf8dgos16kcrjbum79rhv0g%40group.calendar.google.com&ctz=America%2FGuatemala')");
        DB::insert("insert into AppExterna(nombre, ruta, descripcion, linkexterno) values ('TokBox','/img/AppExt3_TokBox.png', 'Ingresa al VideoChat', '/AppExterna/Videochat')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

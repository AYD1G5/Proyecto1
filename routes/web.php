<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Encuesta;
use App\ComentarioTema;

Route::get('/', function () {
    return \redirect("/cursosporsemestre/1/semestre");
});

//Se asigna esta ruta a la vista para listar usuarios, se desea ver que se le agreguen los componentes necesarios
Route::get('/ListarUsuarios', 'ListarUsuariosController@ListarUsuarioOficiales');

Route::get("/MiguelRuano", function(){
  return 'Hola';
});

Route::get("/welcome", function(){
    return \redirect("/cursosporsemestre/1/semestre");
  });

Route::get('/pruebaUsuariosCursoCarrera/{id_curso}/{id_carrera}/{id_usuario}', function($id_curso, $id_carrera, $id_usuario){
    return 'Usuario: '.$id_usuario.' Curso: '.$id_curso.' Carrera: '.$id_carrera;
});


 //------------------ Rutas Perfil Tema ------------
 Route::group( ['middleware' => 'auth' ], function()
 {
 Route::get('/PerfilTema/{tema_id}', 'PerfilTemaController@PerfilTema');
 });
 Route::post('/PerfilTema/{tema_id}', function (Request $request,$tema_id){
     $texto = $request->input('texto');
     $objeto=new ComentarioTema();
     $objeto->user_id =  Auth::id();
     $objeto->tema_id=$tema_id;
     $objeto->comentario=$texto;
     $objeto->save();
    // dump($texto);
   /*  $preparacion = $request->input('preparacion');
     $manejo = $request->input('manejo');
     $entendible = $request->input('entendible');
     $accesible = $request->input('accesible');
     $responsable = $request->input('responsable');
     $file = $request->file('file');
     $nombre = $file->getClientOriginalName();
     \Storage::disk('local')->put($nombre,  \File::get($file));*/
     return \redirect("/PerfilTema/".$tema_id);
 });

Route::group( ['middleware' => 'auth' ], function()
{
    Route::resource('/asignaciontemporal', 'AsignacionTempController');
    Route::get('asignaciontemporal/{id}/{idsemestre}/create', 'AsignacionTempController@create');
    Route::get('asignaciontemporal/guardar', 'AsignacionTempController@guardar');
    Route::get('asignaciontemporal/{id}/mostrar', 'CursoController@mostrarcurso');
    Route::get('editar/{idsemestre}/{id}', 'AsignacionTempController@edit');
    Route::get('revisarasignacion/{id}', 'AsignacionTempController@revision');
    Route::get('finalizarasignacion/', 'AsignacionTempController@finalizar');

    Route::resource('/cursosporsemestre', 'CursosPorSemestreController');
    Route::get('/cursosporsemestre/{id}/semestre', 'AsignacionTempController@semestre');
    Route::get('/ReporteCursosGanados', 'CursosPorSemestreController@cursosganados');
    Route::get('/ReporteCursosObligaPendientes', 'CursosPorSemestreController@pendientesobligatorios');

    /*
     *  LAS RUTAS DEBAJO DE ESTE COMENTARIO FUERON UTILIZADOS PARA EL REPORTE DE ENCUESTA
     */

    Route::get('/ReporteEncuestaCatedraticos', 'CursosPorSemestreController@Pruebaencuestacatedraticos');
    Route::get('/REncuestaCatedraticos/{curso}/{catedratico}', 'CursosPorSemestreController@encuestacatedraticos');

    /*
    *   Estas rutas se utilizaron para poder probar las consultas que realizamos
    *
    */
/*    Route::get('/TestReporteEncuesta1/{id}', 'CursosPorSemestreController@encuestacatedraticos');
    Route::get('/TestReporteEncuesta2/{id}/{semestre}', 'CursosPorSemestreController@encuestacatedraticos');
    Route::get('/TestReporteEncuesta3/{id}/{semestre}/{catedratico}', 'CursosPorSemestreController@encuestacatedraticos');
    Route::get('/TestReporteEncuesta4/{id}/{semestre}/{catedratico}/{anio}', 'CursosPorSemestreController@encuestacatedraticos');
*/

    Route::get('/eliminar/{id}/{id1}', 'AsignacionTempController@desasignar');
    Route::get('/puntearcurso/{idcurso}/{noestrellas}', 'AsignacionTempController@puntear');
    Route::get('/punteocurso/{idcurso}/{nota}', 'AsignacionTempController@punteocurso');
    Route::post('/notacurso/{id}', 'AsignacionTempController@notacurso')->name('notacurso');
    Route::post('/terminarasignacion', 'AsignacionTempController@terminarasignacion');
    Route::get('/curso/material/listarmaterialdeapoyo/{id_curso_pensum}/','MaterialDeApoyoController@listarMaterial');
    Route::post('/curso/material/subirmaterialdeapoyo/{id_curso_pensum}/','MaterialDeApoyoController@subirArchivo');
    Route::get('/curso/material/descargarmaterialdeapoyo/{id_material}/','MaterialDeApoyoController@descargarArchivo');
    Route::get('/PerfilGrupo', 'PerfilGrupoController@PerfilGrupo');
    Route::get('/TemaGrupo/{id}', 'PerfilGrupoController@TemaGrupo');
    Route::get('/ComentarioGrupo/{id}', 'PerfilGrupoController@ComentarioGrupo');
    Route::get('/ReporteCursosGanados', 'CursosPorSemestreController@cursosganados');
    Route::get('/PerfilCatedratico/{idCatedratico}/', 'PerfilCatController@datosCatedratico');
    Route::get('/encuesta/{curso}/{catedratico}', 'Funciones@encuesta');
    Route::post('/encuesta/{curso}/{catedratico}','Funciones@encuestas');
    Route::post('/masiva','Funciones@masiva');
    Route::get('/carga/{archivo}', 'Funciones@carga');
    Route::get('/cargamasiva', '@Funciones@cargamasiva');
    //Buscadores
    Route::get('/BuscadorCurso', 'BuscadorCursoController@BuscadorCurso');
    Route::get('/BuscadorPersonas', 'BuscadorPersonasController@BuscadorPersonas');
    Route::post('/BuscadorPersonas', 'BuscadorPersonasController@ListarPersonas');
    Route::get('/BuscadorCatedratico', 'BuscadorCatController@BuscadorCatedratico');
    Route::get('/BuscadorTemas', 'BuscadorTemasController@BuscadorTemas');
    Route::post('/BuscadorTemas', 'BuscadorTemasController@BuscadorTemas2');
    Route::get('/BuscadorGrupo', 'BuscadorGrupoController@BuscadorGrupo');
    Route::post('/BuscadorGrupo', 'BuscadorGrupoController@BuscadorGrupo2');
    Route::get('/BuscadorGrupo/{id}', 'BuscadorGrupoController@BuscadorGrupo3');
    //APP Externa
    Route::get('/AppExterna', 'AppExternaController@AppExterna');
    Route::get('/AppExterna/Videochat', 'AppExternaController@videochat');
    Route::get('/AppExterna/WhatssApp', 'AppExternaController@WhatssApp');
    Route::post('/AppExterna/WhatssApp','AppExternaController@EnviarWhatssApp');  
    Route::get('/buscadores', 'Funciones@buscador'); 
    Route::get('/eliminarasignacion', 'AsignacionTempController@eliminarasignacion');
    Route::get('/ListarTemas', 'ListarTemasController@index');
    Route::get('/chat', 'ChatController@index')->name('chat');
    Route::get('/message', 'MessageController@index')->name('message');
    Route::post('/message', 'MessageController@store')->name('message.store');
    Route::get('/CrearGrupo', 'CrearGrupoController@CrearGrupo'); 
    Route::post('/CrearGrupo', 'CrearGrupoController@GuardarGrupo'); 
    Route::get('/CodigoGrupo/{id}', 'CrearGrupoController@CodigoGrupo'); 
    Route::get('/GruposCreados', 'CrearGrupoController@GruposCreados');
    //CREAR
    Route::post('/TemaGrupo/{id}', 'PerfilGrupoController@TemaGrupoCrear'); 
    Route::post('/ComentarioGrupo/{id}', 'PerfilGrupoController@comentarioGrupoCrear'); 
    Route::get('/CrearTemas/{id}', 'CrearTemasController@index');
    Route::post('/CrearTemas/{id}', 'CrearTemasController@guardar');
    
    Route::get('/solicitudes/listar', 'SolicitudesController@listarSolicitudes');
    Route::get('/solicitudes/crear/{amigoid}', 'SolicitudesController@crearSolicitudPagina');
    Route::get('/solicitudes/cambiarestado/{solicitudid}/{noestado}', 'SolicitudesController@cambiarEstadoSolicitud');
    Route::get('/PerfilUsuario/{idusuario}/', 'PerfilUsuarioController@PerfilUsuario');

    Route::get('/FormNuevoPensum', 'FormNuevoPensumController@FormNuevoPensum'); 
    Route::post('/FormNuevoPensum', 'FormNuevoPensumController@FormNuevoPensumGuardar'); 
    Route::get('/FormNuevoPensumConfir', 'FormNuevoPensumController@FormNuevoPensumConfir'); 

    Route::get('/ListarUsuarios2', 'BloquearUsuariosController@Listar');
    Route::get('/bloquear/{id}', 'BloquearUsuariosController@Bloquear');
    Route::get('/desbloquear/{id}', 'BloquearUsuariosController@Desbloquear');

});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/message', 'MessageController@index')->name('message');
Route::post('/message', 'MessageController@store')->name('message.store');



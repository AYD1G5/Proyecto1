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
    return view('welcome');
});

Route::get("/MiguelRuano", function(){
  return 'Hola';
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
    Route::get('/BuscadorPersonas', 'BuscadorPersonasController@BuscadorPersonas');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/chat', 'ChatController@index')->name('chat');

Route::get('/message', 'MessageController@index')->name('message');
Route::post('/message', 'MessageController@store')->name('message.store');


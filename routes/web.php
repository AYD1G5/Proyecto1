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
use Illuminate\Http\Request;
use App\Encuesta;
Route::get('/', function () {
    return view('welcome');
});

Route::get("/MiguelRuano", function(){
  return 'Hola';
});

Route::get('/pruebaUsuariosCursoCarrera/{id_curso}/{id_carrera}/{id_usuario}', function($id_curso, $id_carrera, $id_usuario){
    return 'Usuario: '.$id_usuario.' Curso: '.$id_curso.' Carrera: '.$id_carrera;
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
    Route::get('/eliminar/{id}/{id1}', 'AsignacionTempController@desasignar');    
    Route::get('/puntearcurso/{idcurso}/{noestrellas}', 'AsignacionTempController@puntear');    
    Route::get('/punteocurso/{idcurso}/{nota}', 'AsignacionTempController@punteocurso');    
    Route::post('/notacurso/{id}', 'AsignacionTempController@notacurso')->name('notacurso');
    Route::post('/terminarasignacion', 'AsignacionTempController@terminarasignacion');

    Route::get('/encuesta/{curso}/{catedratico}', 'Funciones@encuesta');
    Route::post('/encuesta/{curso}/{catedratico}','Funciones@encuestas');
    Route::post('/masiva','Funciones@masiva');
    Route::get('/carga/{archivo}', 'Funciones@carga');
    Route::get('/cargamasiva', '@Funciones@cargamasiva');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

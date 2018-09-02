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

Route::get('/cargamasiva', function (){
    return view('subir');
});

Route::post('/masiva', function (Request $request){
    $file = $request->file('file');
    $nombre = $file->getClientOriginalName();
    \Storage::disk('local')->put($nombre,  \File::get($file));
    return \redirect("/carga/".$nombre);
});

Route::get('/carga/{archivo}', function ($archivo) {
    $public_path = storage_path();
    $url = $public_path.'/app/'.$archivo;
    DB::select("delete from temporal");
    if (($gestor = fopen($url, "r")) !== FALSE) {
        while (($datos = fgetcsv($gestor, 1000, ";")) !== FALSE) {
                //dd(iconv('UCS-2', 'UTF-8', $datos[1]."\0")) ;
                $datos[0]=utf8_encode ( $datos[0]);
                $datos[1]=utf8_encode ( $datos[1]);
                DB::insert("INSERT INTO temporal (nombre,apellido,correo,contrasena,puesto,jefe,departamento,permisos) VALUES ('$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]', '$datos[4]', '$datos[5]', '$datos[6]', '$datos[7]')");
        }
        fclose($gestor);
    //LLENAR TABLA USUARIOS Y PERMISOS
    DB::Select("delete from users where id>1");
    DB::Select("delete from detallepermisos where id>8");
    $tuplas=DB::Select("select * from temporal");
    $total=0;
    foreach ($tuplas as $tupla)
        {
            $jefe=null;
            $departamento=0;
            $Usuario = new \App\User();
            $puesto = 0;
            //----------------departamento-----------------------
            $dep=DB::Select("select id from departamentos where nombredepartamento='".$tupla->departamento."'");
            if(count($dep)>0)
            {
                $departamento=$dep[0]->id;
            }
            else
            {
                DB::Insert("insert into departamentos (nombredepartamento) values('".$tupla->departamento."')");
                $dep=DB::Select("select id from departamentos where nombredepartamento='".$tupla->departamento."'");
                $departamento=$dep[0]->id;
            }
            //----------------puesto------------------------------
            $dep=DB::Select("select id from puestos where nombrepuesto='".$tupla->puesto."'");
            if(count($dep)>0)
            {
                $puesto=$dep[0]->id;
            }
            else
            {
                DB::Insert("insert into puestos (nombrepuesto) values('".$tupla->puesto."')");
                $dep=DB::Select("select id from puestos where nombrepuesto='".$tupla->puesto."'");
                $puesto=$dep[0]->id;
            }

            $Usuario->name = $tupla->nombre;
            $Usuario->lastname = $tupla->apellido;
            $Usuario->email = $tupla->correo;
            $Usuario->puesto = $puesto;
            $Usuario->departamento = $departamento;
            $Usuario->password = Hash::make($tupla->contrasena);;
            $Usuario->save();


            $permisos=$tupla->permisos;
            $permisos=str_replace("[", "", $permisos);
            $permisos=str_replace("]", "", $permisos);
            $numeros=explode(",",$permisos);

            $id=DB::Select("select id from users where email='".$tupla->correo."'");
            foreach ($numeros as $numero)
            {
                $DetallePermiso = new \App\Detallepermiso();
                $DetallePermiso->user_id = $id[0]->id;
                $DetallePermiso->permisos_id = $numero;
                $DetallePermiso->save();
            }
    }
    foreach ($tuplas as $tupla)
    {
            if($tupla->jefe != "")
            {
                $id=DB::Select("select id from users where name='".$tupla->jefe."'");
                if(count($id)>0)
                {
                    DB::Select("update users set id_jefe='".$id[0]->id."'where name='".$tupla->nombre."'");
                }
            }
    }
    dd("completado");
}});


Route::get('/pruebaUsuariosCursoCarrera/{id_curso}/{id_carrera}/{id_usuario}', function($id_curso, $id_carrera, $id_usuario){
    return 'Usuario: '.$id_usuario.' Curso: '.$id_curso.' Carrera: '.$id_carrera;
});

Route::post('/encuesta/{curso}/{catedratico}', function(Request $request,$curso, $catedratico){
    // $apellidos =$request->editList;
    $puntual = $request->input('puntual');
    $preparacion = $request->input('preparacion');
    $manejo = $request->input('manejo');
    $entendible = $request->input('entendible');
    $accesible = $request->input('accesible');
    $responsable = $request->input('responsable');

    $objeto=new Encuesta();
    $objeto->pregunta=1;
    $objeto->respuesta=$puntual;
    $objeto->curso = $curso;
    $objeto->catedratico=$catedratico;
    $objeto->save();

    $objeto=new Encuesta();
    $objeto->pregunta=2;
    $objeto->respuesta=$preparacion;
    $objeto->curso = $curso;
    $objeto->catedratico=$catedratico;
    $objeto->save();

    $objeto=new Encuesta();
    $objeto->pregunta=3;
    $objeto->respuesta=$manejo;
    $objeto->curso = $curso;
    $objeto->catedratico=$catedratico;
    $objeto->save();

    $objeto=new Encuesta();
    $objeto->pregunta=4;
    $objeto->respuesta=$entendible;
    $objeto->curso = $curso;
    $objeto->catedratico=$catedratico;
    $objeto->save();

    $objeto=new Encuesta();
    $objeto->pregunta=5;
    $objeto->respuesta=$accesible;
    $objeto->curso = $curso;
    $objeto->catedratico=$catedratico;
    $objeto->save();

    $objeto=new Encuesta();
    $objeto->pregunta=6;
    $objeto->respuesta=$responsable;
    $objeto->curso = $curso;
    $objeto->catedratico=$catedratico;
    $objeto->save();
    dd("siguiente vista");
 });
 
 Route::get('/encuesta/{curso}/{catedratico}', function($curso, $catedratico){
     return view("encuesta")
     ;
 });
Route::group( ['middleware' => 'auth' ], function()
{
    Route::resource('/asignaciontemporal', 'AsignacionTempController');
    Route::get('asignaciontemporal/{id}/{idsemestre}/create', 'AsignacionTempController@create');
    Route::get('asignaciontemporal/guardar', 'AsignacionTempController@guardar');
    Route::get('asignaciontemporal/{id}/mostrar', 'AsignacionTempController@show');
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
    Route::get('/ReporteCursosGanados', 'CursosPorSemestreController@cursosganados');
    Route::get('PerfilCatedratico/', 'PerfilCatController@datos_catedratico');

});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

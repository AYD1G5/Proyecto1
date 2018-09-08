<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Auth;
use DB;
use App\User;
use App\Curso;
use App\Curso_pensum;
use App\Curso_prerequisito;
use App\Curso_postrequisito;
use App\Pensum_estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\ObjetoCurso;
use App\ObjetoSemestre;

class CursosPorSemestreController extends Controller
{


  public function ColleccionSemestres(){
      $semestresCollection = new Collection();
      for($i = 1;$i<=10;$i++)
      {
          $obj = new ObjetoSemestre();
          $obj->nombreSemetre =$i." SEM";
          $obj->numero = $i;
          $obj->color=$this->EstadoSemestre($i);
         $semestresCollection->push($obj);
      }
      //die($semestresCollection);
      return $semestresCollection;
  }

  public function EstadoSemestre($id){
      $cursos = $this->semestre($id);
      $totalCursos = 0;
      $cursosGanados =0;
      $cursosPendientes = 0;
      foreach ($cursos as $curso){
          // Code Here
          if($curso->estado=="GANADO"){
              $cursosGanados++;
          }else{
              $cursosPendientes ++;
          }
          $totalCursos++;
      }
      $tipo="";
      if($cursosGanados>0){
          if($cursosPendientes==0){
              $tipo="VERDE"; //Verde No hay pendientes
          }else{
              $tipo="AMARILLO"; //Amarillo Faltan
          }
      }else{
          $tipo = "ROJO"; //Rojo
      }
    //  die($cursos);
    return $tipo;
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    public function semestre($id)
    {
        $pensumestudiante=DB::table('pensum_estudiante')
        ->where('id_estudiante', '=', Auth::id())
        ->first(); // los multipensum se implementaras despues

        $cursos=DB::table('curso as c')
        ->join('curso_pensum as cupe', 'cupe.id_curso', '=', 'c.id_curso')
        ->join('pensum as pe', 'cupe.id_pensum', '=', 'pe.id_pensum')
        ->select('cupe.id_curso_pensum as id_curso_pensum', 'c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
                'cupe.categoria as categoria', 'cupe.creditos as creditos', 'cupe.restriccion as restriccion')
        ->where('cupe.id_pensum', '=', $pensumestudiante->id_pensum)
        ->where('cupe.semestre', '=', $id)
        ->get();

        /** INICIALIZAR LA COLECCION DE SALIDA */
        $cursosCollection = new Collection();
        $str = '';

        /** BUSCAR TODOS LOS CURSOS DEL SEMESTRE */
        foreach ($cursos as &$curso) {
            /*** VER TODAS LAS ASIGNACIONES DEL USUARIO DE ESE CURSO PARA SABER LAS NOTAS */
            $asignaciones=DB::table('curso_asignacion as cuasig')
                ->join('asignacion as asig', 'cuasig.id_asignacion', '=', 'asig.id_asignacion')
                ->select('cuasig.nota as nota')
                ->where('cuasig.id_curso_pensum', '=', $curso->id_curso_pensum)
                ->where('asig.id_estudiante', '=', Auth::id())
                ->get();

            $cursoganado = false;
            /*** SI LA NOTA DE ALGUNA ASIGNACION ES 61 YA LO GANÓ */
            foreach ($asignaciones as &$asignac){
                if($asignac->nota >= 61){
                    $cursoganado = true;
                    break;
                }
            }
            if($cursoganado){
                /** GANADO ***/
                $objetoCurso = new ObjetoCurso();
                $objetoCurso->nombre_curso = $curso->nombre_curso;
                $objetoCurso->codigo_curso = $curso->codigo_curso;
                $objetoCurso->estado = $curso->estado = 'GANADO';
                $cursosCollection->push($objetoCurso);
            }else{
                /*** VER TODOS LOS PREREQUISITOS DEL CURSO BUSCAR SUS ASUGNACIONES Y VER SI ESTAN GANADOS */
                $lprerequisitos=DB::table('curso_prerequisito as cpre')
                ->select('cpre.id_curso as id_curso_pre', 'cpre.id_curso_pensum as padreprerequisito')
                ->where('cpre.id_curso_pensum', '=', $curso->id_curso_pensum)
                ->get();
                /*** BUSCAR LOS PREREQUISITOS EN TODAS LAS ASIGNACIONES ***/
                $str .= ', prerequisitos: ';
                $requisitossatisfechos = true;
                foreach ($lprerequisitos as &$prerequisito){
                    /*** BUSCAR LAS NOTAS EN TODAS LAS ASIGNACIONES */
                    $asignacionesdeestecurso=DB::table('curso_asignacion as cuasig')
                    ->join('asignacion as asig', 'cuasig.id_asignacion', '=', 'asig.id_asignacion')
                    ->select('cuasig.nota as nota')
                    ->where('cuasig.id_curso_pensum', '=', $prerequisito->id_curso_pre)
                    ->where('asig.id_estudiante', '=', Auth::id())
                    ->get();

                    /*** BUSCAR SI GANÓ O PERDIÓ EN LAS ASIGNACIONES */
                    $str .= $prerequisito->id_curso_pre;
                    $prereqganado = false;
                    foreach ($asignacionesdeestecurso as &$asignacionesdecurso){
                        if($asignacionesdecurso->nota >= 61){
                            $prereqganado = true;
                            break;
                        }
                    }
                    if($prereqganado){
                        $str .= ', GANADO... REPETIDO: ';
                        $str .= ', ';
                    }else{
                        $str .= ', INSATISFECHO ';
                        $requisitossatisfechos = false;
                        break;
                    }

                    /** MOSTRAR NOTAS DE TODAS LAS ASIGNACIONES DEL CURSO */
                    $repitencia = 0;
                    foreach ($asignacionesdeestecurso as &$asignacionesdecurso){
                        $repitencia = $repitencia + 1;
                        $str .= '(';
                        $str .= $asignacionesdecurso->nota;
                        $str .= '), ';
                    }
                }
                if(!$requisitossatisfechos){
                    /** BLOQUEADO */
                    $objetoCurso = new ObjetoCurso();
                    $objetoCurso->nombre_curso = $curso->nombre_curso;
                    $objetoCurso->codigo_curso = $curso->codigo_curso;
                    $objetoCurso->estado = $curso->estado = 'BLOQUEADO';
                    $cursosCollection->push($objetoCurso);
                }else{
                    /** DESBLOQUEADO */
                    $objetoCurso = new ObjetoCurso();
                    $objetoCurso->nombre_curso = $curso->nombre_curso;
                    $objetoCurso->codigo_curso = $curso->codigo_curso;
                    $objetoCurso->estado = $curso->estado = 'DESBLOQUEADO';
                    $cursosCollection->push($objetoCurso);
                }
            }
        }
        return $cursosCollection;
    }

    public function encuestacatedraticos($Id_curso, $Id_catedratico){
      $NombreCurso = DB::select('select nombre_curso as nam from curso where id_curso = '.$Id_curso);
      $NombreCatedratico = DB::select('select nombre from users where id = '.$Id_catedratico.' and id_rol = 1');
      $ResultadoEncuesta =DB::select('select enc.pregunta as preg, AVG(enc.respuesta) as res FROM encuestas as enc WHERE enc.catedratico = '.$Id_catedratico.' and enc.curso = '.$Id_curso.' GROUP BY pregunta');
      $ResultadoPromedio = DB::select('select SUM(respuesta) as sumi, AVG(respuesta) as prom FROM encuestas');
        return view('Reportes.reporte3')
        ->with("arreglo", $ResultadoEncuesta)
        ->with("arreglo1", $ResultadoPromedio)
        ->with("arreglo2", $NombreCurso)
        ->with("arreglo3", $NombreCatedratico);
    }
    public function Pruebaencuestacatedraticos()
    {
      // id_catedratico, id_curso
      /*$ResultadoEncuesta = DB::table('encuestas')
                        ->select('*')
                        ->where('catedratico', '=', $Id_catedratico)
                        ->where('curso', '=', $Id_curso)
                        ->get();
                        */
      //se utilizo esta parte para hacer las pruebas a la base de Datos
      //y las consultas que necesitamos
    /*  $cursos=DB::table('encuestas')
      ->join('curso_pensum as cupe', 'cupe.id_curso', '=', 'c.id_curso')
      ->join('pensum as pe', 'cupe.id_pensum', '=', 'pe.id_pensum')
      ->select('cupe.id_curso_pensum as id_curso_pensum', 'c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
              'cupe.categoria as categoria', 'cupe.creditos as creditos', 'cupe.restriccion as restriccion')
      ->where('cupe.id_pensum', '=', $pensumestudiante->id_pensum)
      ->get();

      $pensumestudiante=DB::table('cursosganados')
      ->where('id_curso', '=', Auth::id())
      ->first()//pendiente realizar esta funcionalidad


      $pensumestudiante=DB::table('pensum_estudiante')
      ->where('id_estudiante', '=', Auth::id())
      ->first()//pendiente realizar esta funcionalidad

      $EncuestaCatedratico = DB::table('encuestas')
      ->where('catedratico', '=', '1')
      ->first;//pendiente recibir el parametro

      $cursosCollection = new Collection();// en esta collecion añadiremos el contenido de nuestra consulta
      $str = '';*/

      return view('Reportes.reporte3');
    }

    public function cursosganados()
    {
        $pensumestudiante=DB::table('pensum_estudiante')
        ->where('id_estudiante', '=', Auth::id())
        ->first(); // los multipensum se implementaras despues

        $cursos=DB::table('curso as c')
        ->join('curso_pensum as cupe', 'cupe.id_curso', '=', 'c.id_curso')
        ->join('pensum as pe', 'cupe.id_pensum', '=', 'pe.id_pensum')
        ->select('cupe.id_curso_pensum as id_curso_pensum', 'c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
                'cupe.categoria as categoria', 'cupe.creditos as creditos', 'cupe.restriccion as restriccion')
        ->where('cupe.id_pensum', '=', $pensumestudiante->id_pensum)
        ->get();

        /** INICIALIZAR LA COLECCION DE SALIDA */
        $cursosCollection = new Collection();
        $str = '';

        /** BUSCAR TODOS LOS CURSOS DEL SEMESTRE */
        foreach ($cursos as &$curso) {
            /*** VER TODAS LAS ASIGNACIONES DEL USUARIO DE ESE CURSO PARA SABER LAS NOTAS */
            $asignaciones=DB::table('curso_asignacion as cuasig')
                ->join('asignacion as asig', 'cuasig.id_asignacion', '=', 'asig.id_asignacion')
                ->select('cuasig.nota as nota')
                ->where('cuasig.id_curso_pensum', '=', $curso->id_curso_pensum)
                ->where('asig.id_estudiante', '=', Auth::id())
                ->get();

            $cursoganado = false;
            $nota = 0;

            /*** SI LA NOTA DE ALGUNA ASIGNACION ES 61 YA LO GANÓ */
            foreach ($asignaciones as &$asignac){
                if($asignac->nota >= 61){
                    $cursoganado = true;
                    $nota= $asignac->nota;
                    break;
                }
            }
            if($cursoganado){
                /** GANADO ***/
                $objetoCurso = new ObjetoCurso();
                $objetoCurso->nombre_curso = $curso->nombre_curso;
                $objetoCurso->codigo_curso = $curso->codigo_curso;
                $objetoCurso->creditos = $curso->creditos;
                $objetoCurso->estado = $curso->estado = 'GANADO';
                $objetoCurso->nota = $nota;
                $cursosCollection->push($objetoCurso);
            }
        }
        return view('Reportes.reporte1')->with("arreglo",$cursosCollection);
    }

    public function pendientesobligatorios()
    {
        $pensumestudiante=DB::table('pensum_estudiante')
        ->where('id_estudiante', '=', Auth::id())
        ->first(); // los multipensum se implementaras despues

        $cursos=DB::table('curso as c')
        ->join('curso_pensum as cupe', 'cupe.id_curso', '=', 'c.id_curso')
        ->join('pensum as pe', 'cupe.id_pensum', '=', 'pe.id_pensum')
        ->select('cupe.id_curso_pensum as id_curso_pensum', 'c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
                'cupe.categoria as categoria', 'cupe.creditos as creditos', 'cupe.restriccion as restriccion')
        ->where('cupe.id_pensum', '=', $pensumestudiante->id_pensum)
        ->get();

        /** INICIALIZAR LA COLECCION DE SALIDA */
        $cursosCollection = new Collection();
        $str = '';

        /** BUSCAR TODOS LOS CURSOS DEL SEMESTRE */
        foreach ($cursos as &$curso) {
            /*** VER TODAS LAS ASIGNACIONES DEL USUARIO DE ESE CURSO PARA SABER LAS NOTAS */
            $asignaciones=DB::table('curso_asignacion as cuasig')
                ->join('asignacion as asig', 'cuasig.id_asignacion', '=', 'asig.id_asignacion')
                ->select('cuasig.nota as nota')
                ->where('cuasig.id_curso_pensum', '=', $curso->id_curso_pensum)
                ->where('asig.id_estudiante', '=', Auth::id())
                ->get();

            $cursoganado = false;
            /*** SI LA NOTA DE ALGUNA ASIGNACION ES 61 YA LO GANÓ */
            foreach ($asignaciones as &$asignac){
                if($asignac->nota >= 61){
                    $cursoganado = true;
                    break;
                }
            }
            if($cursoganado){

            }else{
                /*** VER TODOS LOS PREREQUISITOS DEL CURSO BUSCAR SUS ASUGNACIONES Y VER SI ESTAN GANADOS */
                $lprerequisitos=DB::table('curso_prerequisito as cpre')
                ->select('cpre.id_curso as id_curso_pre', 'cpre.id_curso_pensum as padreprerequisito')
                ->where('cpre.id_curso_pensum', '=', $curso->id_curso_pensum)
                ->get();
                /*** BUSCAR LOS PREREQUISITOS EN TODAS LAS ASIGNACIONES ***/
                $str .= ', prerequisitos: ';
                $requisitossatisfechos = true;
                foreach ($lprerequisitos as &$prerequisito){
                    /*** BUSCAR LAS NOTAS EN TODAS LAS ASIGNACIONES */
                    $asignacionesdeestecurso=DB::table('curso_asignacion as cuasig')
                    ->join('asignacion as asig', 'cuasig.id_asignacion', '=', 'asig.id_asignacion')
                    ->select('cuasig.nota as nota')
                    ->where('cuasig.id_curso_pensum', '=', $prerequisito->id_curso_pre)
                    ->where('asig.id_estudiante', '=', Auth::id())
                    ->get();

                    /*** BUSCAR SI GANÓ O PERDIÓ EN LAS ASIGNACIONES */
                    $str .= $prerequisito->id_curso_pre;
                    $prereqganado = false;
                    foreach ($asignacionesdeestecurso as &$asignacionesdecurso){
                        if($asignacionesdecurso->nota >= 61){
                            $prereqganado = true;
                            break;
                        }
                    }
                    if($prereqganado){
                        $str .= ', GANADO... REPETIDO: ';
                        $str .= ', ';
                    }else{
                        $str .= ', INSATISFECHO ';
                        $requisitossatisfechos = false;
                        break;
                    }

                    /** MOSTRAR NOTAS DE TODAS LAS ASIGNACIONES DEL CURSO */
                    $repitencia = 0;
                    foreach ($asignacionesdeestecurso as &$asignacionesdecurso){
                        $repitencia = $repitencia + 1;
                        $str .= '(';
                        $str .= $asignacionesdecurso->nota;
                        $str .= '), ';
                    }
                }
                if(!$requisitossatisfechos){
                    /** BLOQUEADO */
                    $objetoCurso = new ObjetoCurso();
                    $objetoCurso->nombre_curso = $curso->nombre_curso;
                    $objetoCurso->codigo_curso = $curso->codigo_curso;
                    $objetoCurso->estado = $curso->estado = 'BLOQUEADO';
                    $objetoCurso->creditos = $curso->creditos;
                    if($curso->categoria == 'Obligatorio'){
                        $cursosCollection->push($objetoCurso);
                    }

                }else{
                    /** DESBLOQUEADO */
                    $objetoCurso = new ObjetoCurso();
                    $objetoCurso->nombre_curso = $curso->nombre_curso;
                    $objetoCurso->codigo_curso = $curso->codigo_curso;
                    $objetoCurso->estado = $curso->estado = 'DESBLOQUEADO';
                    $objetoCurso->creditos = $curso->creditos;
                    if($curso->categoria == 'Obligatorio'){
                        $cursosCollection->push($objetoCurso);
                    }
                }
            }
        }
        return view('Reportes.reporte2')->with("arreglo",$cursosCollection);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



}

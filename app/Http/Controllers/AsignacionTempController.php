<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\User;
use App\Ciclo;
use App\Asignacion;
use App\Curso;
use App\Http\Requests\CursoAsignacionTempFormRequest;
use App\Http\Requests\NotaFormRequest;
use App\Http\Requests\AsignacionFormRequest;
use App\Asignacion_temporal;
use App\Curso_pensum;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use App\Curso_asignacion_temporal;
use App\Curso_asignacion;
use App\Pensum_estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\ObjetoCurso;
use App\Http\Controllers\CursosPorSemestreController;

class AsignacionTempController extends Controller
{

    function datosDeAsignacionTemporal(){
        $id_asignacion_temporal = Asignacion_temporal::where('id_estudiante', Auth::id())->first();

        $pensumestudiante=DB::table('pensum_estudiante')
        ->where('id_estudiante', '=', Auth::id())
        ->first(); // los multipensum se implementaras despues

        $salida['id_asignacion_temporal'] = $id_asignacion_temporal;
        $salida['pensumestudiante'] = $pensumestudiante;
        return $salida;
    }

    public function semestre($id)
    {
        $semestre =$id;
        $data = $this->datosDeAsignacionTemporal();

        $cursosEnLaAsignacion=DB::table('curso_pensum as cupe')
        ->join('curso_asignacion_temporal as catmp', 'catmp.id_curso_pensum', '=', 'cupe.id_curso_pensum')
        ->select('cupe.id_curso_pensum as id_curso_pensum',
                'catmp.id_curso_asig_temp as id_curso_asig_temp')
        ->where('catmp.id_asignacion_temporal', '=', $data['id_asignacion_temporal']->id_asignacion_temporal)
        ->get();

        $cursos=DB::table('curso as c')
        ->join('curso_pensum as cupe', 'cupe.id_curso', '=', 'c.id_curso')
        ->join('pensum as pe', 'cupe.id_pensum', '=', 'pe.id_pensum')
        ->select('cupe.id_curso_pensum as id_curso_pensum', 'c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
                'cupe.categoria as categoria', 'cupe.creditos as creditos', 'cupe.restriccion as restriccion')
        ->where('cupe.id_pensum', '=', $data['pensumestudiante']->id_pensum)
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
            $objetoCurso = new ObjetoCurso();
            $objetoCurso->nombre_curso = $curso->nombre_curso;
            $objetoCurso->codigo_curso = $curso->codigo_curso;

            /*** SI LA NOTA DE ALGUNA ASIGNACION ES 61 YA LO GANÓ */
            foreach ($asignaciones as &$asignac){
                if($asignac->nota >= 61){
                    $cursoganado = true;
                    break;
                }
            }
            /*** SACAR PROMEDIO DE ESTRELLAS */
            $promedioestrellasporcurso = DB::table('curso_asignacion')
            ->groupBy('id_curso_pensum')
            ->where('id_curso_pensum', '=', $curso->id_curso_pensum)
            ->avg('no_estrellas');
                

            if($cursoganado){
                /** GANADO ***/
                $objetoCurso->estado = $curso->estado = 'GANADO';
                $objetoCurso->no_estrellas = $promedioestrellasporcurso;
                $cursosCollection->push($objetoCurso);
            }else{
                /*** VER TODOS LOS PREREQUISITOS DEL CURSO BUSCAR SUS ASUGNACIONES Y VER SI ESTAN GANADOS */
                $lprerequisitos=DB::table('curso_prerequisito as cpre')
                ->select('cpre.id_curso as id_curso_pre', 'cpre.id_curso_pensum as padreprerequisito')
                ->where('cpre.id_curso_pensum', '=', $curso->id_curso_pensum)
                ->get();
                /*** BUSCAR LOS PREREQUISITOS EN TODAS LAS ASIGNACIONES ***/
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
                    }else{
                        $requisitossatisfechos = false;
                        break;
                    }

                    /** MOSTRAR NOTAS DE TODAS LAS ASIGNACIONES DEL CURSO */
                    $repitencia = 0;
                    foreach ($asignacionesdeestecurso as &$asignacionesdecurso){
                        $repitencia = $repitencia + 1;
                    }
                }
                foreach ($lprerequisitos as &$prerequisito){

                }
                if(!$requisitossatisfechos){
                    /** BLOQUEADO */
                    $objetoCurso->estado = $curso->estado = 'BLOQUEADO';
                    $objetoCurso->no_estrellas = $promedioestrellasporcurso;
                    $cursosCollection->push($objetoCurso);
                }else{
                    /** DESBLOQUEADO */
                    $idcursoasignaciontemp = -1;
                    $objetoCurso->estado = $curso->estado = 'DESBLOQUEADO';
                    foreach ($cursosEnLaAsignacion as &$cursoAsignado){
                        if($cursoAsignado->id_curso_pensum == $curso->id_curso_pensum){
                            $idcursoasignaciontemp = $cursoAsignado->id_curso_asig_temp;
                            $objetoCurso->estado = $curso->estado = 'ASIGNADO';
                            break;
                        }
                    }
                    $objetoCurso->no_estrellas = $promedioestrellasporcurso;
                    $objetoCurso->idcursoasignaciontemp = $idcursoasignaciontemp;
                    $cursosCollection->push($objetoCurso);
                }
            }
        }
 //              return $cursosCollection;
        $objeto1 = New CursosPorSemestreController();
        return view('estadoCurso.estadoCurso')->with("semestre",$id)->with("elementos",$cursosCollection)->with("semestre",$semestre)->with("Estados",$objeto1->ColleccionSemestres());
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->datosDeAsignacionTemporal();

        $cursos=DB::table('curso as c')
        ->join('curso_pensum as cupe', 'cupe.id_curso', '=', 'c.id_curso')
        ->join('pensum as pe', 'cupe.id_pensum', '=', 'pe.id_pensum')
        ->select('cupe.id_curso_pensum as id_curso_pensum', 'c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
                'cupe.categoria as categoria', 'cupe.creditos as creditos', 'cupe.restriccion as restriccion')
        ->where('cupe.id_pensum', '=', $data['pensumestudiante']->id_pensum)
        ->get();

        $cursos_ya_agregados=DB::table('curso as c')
        ->join('curso_pensum as cupe', 'cupe.id_curso', '=', 'c.id_curso')
        ->join('pensum as pe', 'cupe.id_pensum', '=', 'pe.id_pensum')
        ->join('curso_asignacion_temporal as catmp', 'catmp.id_curso_pensum', '=', 'cupe.id_curso_pensum')
        ->select('cupe.id_curso_pensum as id_curso_pensum', 'c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
                'cupe.categoria as categoria', 'cupe.creditos as creditos', 'cupe.restriccion as restriccion',
                'catmp.id_curso_asig_temp as id_curso_asig_temp')
        ->where('catmp.id_asignacion_temporal', '=', $data['id_asignacion_temporal']->id_asignacion_temporal)
        ->get();

        return View('asignaciones.index', ["cursos"=>$cursos,
        "pensumestudiante"=>$data['pensumestudiante']->id_pensum,
        "id_asignacion_temporal"=>$data['id_asignacion_temporal'],
        "listado_asignacion_temporal"=>$cursos_ya_agregados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, $idsemestre)
    {
        $catedraticos=DB::table('users as u')
        ->join('curso_catedratico as cc', 'u.id', '=', 'cc.id_catedratico')
        ->where('cc.id_curso_pensum', '=', $id)
        ->get();
        $data = $this->datosDeAsignacionTemporal();

        $curso_pensum = Curso_pensum::findOrFail($id);
        $curso = Curso::findOrFail($curso_pensum->id_curso);

        return View('asignaciones.create', [
            "catedraticos" => $catedraticos,
            "id_asignacion_temporal" => $data['id_asignacion_temporal'],
            "curso_pensum" => $curso_pensum,
            "curso" => $curso,
            "id_semestre" => $idsemestre,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoAsignacionTempFormRequest $request)
    {
        $data = $this->datosDeAsignacionTemporal();

        $asignaciontemp = new Curso_Asignacion_temporal;
        $asignaciontemp->id_curso_pensum = $request->get('id_curso_pensum');
        $asignaciontemp->id_catedratico = $request->get('id_catedratico');
        $asignaciontemp->id_asignacion_temporal = $data['id_asignacion_temporal']->id_asignacion_temporal;
        $asignaciontemp->save();
        return Redirect::to('cursosporsemestre/'.$request->get('id_semestre').'/semestre')->with('notice', 'Curso guardado correctamente.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idsemestre, $id)
    {
        $asignacion_temporal=Curso_asignacion_temporal::find($id);
        $catedraticos=DB::table('users as u')
        ->join('curso_catedratico as ccat', 'u.id', '=', 'ccat.id_catedratico')
        ->where('ccat.id_curso_pensum', '=', $asignacion_temporal->id_curso_pensum)
        ->get();
        $data = $this->datosDeAsignacionTemporal();

        $curso_pensum = Curso_pensum::findOrFail($asignacion_temporal->id_curso_pensum);
        $curso = Curso::findOrFail($curso_pensum->id_curso);

        return View('asignaciones.edit', [
            'asignacion_temporal'=>$asignacion_temporal,
            'catedraticos'=>$catedraticos,
            'id_asignacion_temporal'=>$data['id_asignacion_temporal'],
            'curso_pensum'=>$curso_pensum,
            "curso" => $curso,
            'method'=>'PUT',
            "id_semestre"=>$idsemestre,
        ]);
    }

    public function quitar($id)
    {
        $asignaciones = Asignacion::find($id);
        $estudiantes = User::all();
        $ciclos = Ciclo::all();
        return View('asignaciones.save')
            ->with('asignacion', $asignacion)
            ->with('ciclos', $ciclos)
            ->with('method', 'PUT');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CursoAsignacionTempFormRequest $request, $id)
    {
        $data = $this->datosDeAsignacionTemporal();

        $asignaciontemp = Curso_asignacion_temporal::findOrFail($id);
        $asignaciontemp->id_catedratico = $request->get('id_catedratico');
        //$asignaciontemp->asig_t_id = $data['id_asignacion_temporal']->id;
        $asignaciontemp->update();
        return Redirect::to('cursosporsemestre/'. $request->get('id_semestre').'/semestre');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asignaciontemp = Curso_asignacion_temporal::find($id);
        $asignaciontemp->delete();
        return Redirect::to('asignaciontemporal')->with('notice', 'Curso eliminado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function revision($id)
    {
        $data = $this->datosDeAsignacionTemporal();

        $cursos_ya_agregados=DB::table('curso as c')
        ->join('curso_pensum as cupe', 'cupe.id_curso', '=', 'c.id_curso')
        ->join('pensum as pe', 'cupe.id_pensum', '=', 'pe.id_pensum')
        ->join('curso_asignacion_temporal as catmp', 'catmp.id_curso_pensum', '=', 'cupe.id_curso_pensum')
        ->join('users as usr', 'usr.id', '=', 'catmp.id_catedratico')
        ->select('cupe.id_curso_pensum as id_curso_pensum', 'c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
                'cupe.categoria as categoria', 'cupe.creditos as creditos', 'cupe.restriccion as restriccion',
                'catmp.id_curso_asig_temp as id_curso_asig_temp', 
                'usr.nombre as nombre_catedratico',
                'catmp.no_estrellas as no_estrellas')
        ->where('catmp.id_asignacion_temporal', '=', $data['id_asignacion_temporal']->id_asignacion_temporal)
        ->get();

        return View('asignaciones.revisarasig', ["cursos"=>$cursos_ya_agregados,
        "pensumestudiante"=>$data['pensumestudiante']->id_pensum,
        "id_asignacion_temporal"=>$data['id_asignacion_temporal'],
        "semestre"=>$id]);
    }

    public function desasignar($id,$id1){
        $asignaciontemp = Curso_asignacion_temporal::find($id1);
        $asignaciontemp->delete();
        return Redirect::to('cursosporsemestre/'.$id.'/semestre');
    }

    public function finalizar()
    {
        $data = $this->datosDeAsignacionTemporal();

        $cursos_ya_agregados=DB::table('curso as c')
        ->join('curso_pensum as cupe', 'cupe.id_curso', '=', 'c.id_curso')
        ->join('pensum as pe', 'cupe.id_pensum', '=', 'pe.id_pensum')
        ->join('curso_asignacion_temporal as catmp', 'catmp.id_curso_pensum', '=', 'cupe.id_curso_pensum')
        ->join('users as usr', 'usr.id', '=', 'catmp.id_catedratico')
        ->select('cupe.id_curso_pensum as id_curso_pensum', 'c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
                'cupe.categoria as categoria', 'cupe.creditos as creditos', 'cupe.restriccion as restriccion',
                'catmp.id_curso_asig_temp as id_curso_asig_temp', 
                'usr.nombre as nombre_catedratico', 'usr.id as id_catedratico',
                'catmp.no_estrellas as no_estrellas', 'catmp.nota as nota')
        ->where('catmp.id_asignacion_temporal', '=', $data['id_asignacion_temporal']->id_asignacion_temporal)
        ->get();

        $ciclos = Ciclo::all();
        return View('asignaciones.finalizarasig', ["cursos"=>$cursos_ya_agregados,
        "pensumestudiante"=>$data['pensumestudiante']->id_pensum,
        "id_asignacion_temporal"=>$data['id_asignacion_temporal'],
        "ciclos"=>$ciclos]);
    }

    public function puntear($idcurso, $noestrellas)
    {
        $data = $this->datosDeAsignacionTemporal();

        $asignaciontemp = Curso_asignacion_temporal::findOrFail($idcurso);
        $asignaciontemp->no_estrellas = $noestrellas;
        //$asignaciontemp->asig_t_id = $data['id_asignacion_temporal']->id;
        $asignaciontemp->update();
        return Redirect::to('finalizarasignacion/');
    }

    public function notacurso(NotaFormRequest $request, $id)
    {
        $data = $this->datosDeAsignacionTemporal();

        $asignaciontemp = Curso_asignacion_temporal::findOrFail($id);
        $asignaciontemp->nota = $request->get('nota');
        //$asignaciontemp->asig_t_id = $data['id_asignacion_temporal']->id;
        $asignaciontemp->update();
        return Redirect::to('finalizarasignacion/');
    }

    public function terminarasignacion(Request $request){
        $asignacion = new Asignacion();
        $asignacion->id_estudiante = Auth::id();
        $asignacion->id_ciclo = $request->get('id_ciclo');
        $asignacion->anio = $request->get('anio');
        $asignacion->save();

        $data = $this->datosDeAsignacionTemporal();
        $cursosEnLaAsignacion=DB::table('curso_pensum as cupe')
        ->join('curso_asignacion_temporal as catmp', 'catmp.id_curso_pensum', '=', 'cupe.id_curso_pensum')
        ->join('users as u', 'u.id', '=', 'catmp.id_catedratico')
        ->select('cupe.id_curso_pensum as id_curso_pensum',
                'catmp.id_curso_asig_temp as id_curso_asig_temp',
                'catmp.id_catedratico as id_catedratico', 
                'catmp.nota as nota', 'catmp.no_estrellas as no_estrellas')
        ->where('catmp.id_asignacion_temporal', '=', $data['id_asignacion_temporal']->id_asignacion_temporal)
        ->get();
        foreach ($cursosEnLaAsignacion as &$curso){
            $cursoAsignacion = new Curso_asignacion;
            $cursoAsignacion->id_curso_pensum = $curso->id_curso_pensum;
            $cursoAsignacion->id_asignacion = $asignacion->id_asignacion;
            $cursoAsignacion->id_catedratico = $curso->id_catedratico;
            $cursoAsignacion->nota = $curso->nota;
            $cursoAsignacion->no_estrellas = $curso->no_estrellas;
            $cursoAsignacion->save();
        }
        DB::table('curso_asignacion_temporal')
        ->where('id_asignacion_temporal', '=', $data['id_asignacion_temporal']->id_asignacion_temporal)
        ->delete();
        return Redirect::to('cursosporsemestre/1/semestre');

    }

    public function eliminarAsignacion(){
        Curso_asignacion::truncate();
        Curso_asignacion_temporal::truncate();
    }

}

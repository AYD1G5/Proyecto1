<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\User;
use App\Ciclo;
use App\Asignacion;
use App\Curso;
use App\Asignacion_temporal;
use App\Curso_pensum;
use App\Curso_asignacion_temporal;
use App\Pensum_estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AsignacionTempController extends Controller
{

    function crearAsignacionTmpSiNoExiste($pensumestudiante){
        $id_asignacion_temporal = null;
        $listado_asignacion_temporal = null;    
        if(Asignacion_temporal::where('estudiante_id', Auth::id())->count() == 0){            
            $id_asignacion_temporal = new Asignacion_temporal;
            $id_asignacion_temporal->estudiante_id = Auth::id();
            $id_asignacion_temporal->codigo_pensum = $pensumestudiante->codigo_pensum;
            $id_asignacion_temporal->save();
        }else{
            $id_asignacion_temporal = Asignacion_temporal::where('estudiante_id', Auth::id())->first();
            
            $listado_asignacion_temporal = DB::table('curso as c')
            ->join('curso_pensum as cp', 'c.codigo_curso', '=', 'cp.codigo_curso')
            ->join('pensum as p', 'c.codigo_pensum', '=', 'p.codigo_pensum')
            ->join('curso_asignacion_temporal as cat', 'cat.id_curso_pensum', '=', 'cp.id')
            ->select('c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
                'cp.categoria as categoria, cp.creditos as creditos', 'cp.restriccion as restriccion')
            ->where('cat.asig_t_id', '=', $id_asignacion_temporal);
        }
        $salida['id_asignacion_temporal'] = $id_asignacion_temporal;
        $salida['listado_asignacion_temporal'] = $listado_asignacion_temporal;
        return $salida;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pensumestudiante=DB::table('pensum_estudiante')
        ->where('estudiante_id', '=', Auth::id())
        ->first(); // los multipensum se implementaras despues

        $cursos=DB::table('curso as c')
        ->join('curso_pensum as cp', 'c.codigo_curso', '=', 'cp.codigo_curso')
        ->join('pensum as p', 'cp.codigo_pensum', '=', 'p.codigo_pensum')
        ->select('c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
               'cp.categoria as categoria', 'cp.creditos as creditos', 'cp.restriccion as restriccion')
        ->where('cp.codigo_pensum', '=', $pensumestudiante->codigo_pensum)
        ->paginate(7);

        $atc = new AsignacionTempController();
        $data = $atc->crearAsignacionTmpSiNoExiste($pensumestudiante);

        return View('asignaciones.index', ["cursos"=>$cursos, "pensumestudiante"=>$pensumestudiante->codigo_pensum, 
        "id_asignacion_temporal"=>$data['id_asignacion_temporal'], 
        "listado_asignacion_temporal"=>$data['listado_asignacion_temporal']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catedraticos=DB::table('users')
        ->where('rol', '=', 'docente')
        ->ge();
        $asignacion = new Asignacion();
        $estudiantes = User::all();
        $ciclos = Ciclo::all();
        return View('asignaciones.save')
            ->with('asignacion', $asignacion)
            ->with('ciclos', $ciclos)
            ->with('method', 'POST');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asignaciones = new Asignacion();
        $asignaciones->estudiante_id = $request->estudiante_id;
        $asignaciones->ciclo_id = $request->ciclo_id;
        $asignaciones->anio = $request->anio;
        $asignaciones->save();
        return Redirect::to('asignaciones')->with('notice', 'Tarea guardada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignaciones = Asignacion::find($id);
        return View('asignaciones.show')
            ->with('asignaciones', $asignaciones);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asignaciones = Asignacion::find($id);
        $estudiantes = User::all();
        $ciclos = Ciclo::all();
        return View('asignaciones.save')
            ->with('asignacion', $asignacion)
            ->with('ciclos', $ciclos)
            ->with('method', 'PUT');
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
    public function update(Request $request, $id)
    {
        $asignaciones = Asignacion::find($id);
        $asignaciones->estudiante_id = $request->estudiante_id;
        $asignaciones->ciclo_id = $request->ciclo_id;
        $asignaciones->anio = $request->anio;
        $asignaciones->save();
        return Redirect::to('asignaciones')->with('notice', 'Tarea guardada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}

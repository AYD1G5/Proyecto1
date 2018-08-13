<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\User;
use App\Ciclo;
use App\Asignacion;
use App\Curso;
use App\Http\Requests\CursoAsignacionTempFormRequest;
use App\Asignacion_temporal;
use App\Curso_pensum;
use App\Curso_asignacion_temporal;
use App\Pensum_estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AsignacionTempController extends Controller
{

    function crearAsignacionTmpSiNoExiste(){
        $pensumestudiante=DB::table('pensum_estudiante')
        ->where('estudiante_id', '=', Auth::id())
        ->first(); // los multipensum se implementaras despues

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
            ->join('pensum as p', 'cp.codigo_pensum', '=', 'p.codigo_pensum')
            ->join('curso_asignacion_temporal as cat', 'cat.id_curso_pensum', '=', 'cp.id')
            ->select('cp.id as id_curso_p, c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
                'cp.categoria as categoria, cp.creditos as creditos', 'cp.restriccion as restriccion')
            ->where('cat.asig_t_id', '=', $id_asignacion_temporal)
            ->get();
        }
        $salida['id_asignacion_temporal'] = $id_asignacion_temporal;
        $salida['listado_asignacion_temporal'] = $listado_asignacion_temporal;
        $salida['pensumestudiante'] = $pensumestudiante;
        return $salida;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atc = new AsignacionTempController();
        $data = $atc->crearAsignacionTmpSiNoExiste();

        $cursos=DB::table('curso as c')
        ->join('curso_pensum as cp', 'c.codigo_curso', '=', 'cp.codigo_curso')
        ->join('pensum as p', 'cp.codigo_pensum', '=', 'p.codigo_pensum')
        ->select('cp.id as id_curso_p', 'c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
               'cp.categoria as categoria', 'cp.creditos as creditos', 'cp.restriccion as restriccion')
        ->where('cp.codigo_pensum', '=', $data['pensumestudiante']->codigo_pensum)
        ->paginate(7);

        $cursos_ya_agregados=DB::table('curso as c')
        ->join('curso_pensum as cp', 'c.codigo_curso', '=', 'cp.codigo_curso')
        ->join('pensum as p', 'cp.codigo_pensum', '=', 'p.codigo_pensum')
        ->join('curso_asignacion_temporal as ctmp', 'ctmp.id_curso_pensum', '=', 'cp.id')
        ->select('cp.id as id_curso_p', 'c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
               'cp.categoria as categoria', 'cp.creditos as creditos', 'cp.restriccion as restriccion')
        ->where('ctmp.asig_t_id', '=', $data['id_asignacion_temporal']->id)
        ->get();

        return View('asignaciones.index', ["cursos"=>$cursos, 
        "pensumestudiante"=>$data['pensumestudiante']->codigo_pensum, 
        "id_asignacion_temporal"=>$data['id_asignacion_temporal'], 
        "listado_asignacion_temporal"=>$cursos_ya_agregados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $catedraticos=DB::table('users as u')
        ->join('curso_catedratico as cc', 'u.id', '=', 'cc.codigo_catedratico')
        ->where('cc.curso_pensum', '=', $id)
        ->get();
        $atc = new AsignacionTempController();
        $data = $atc->crearAsignacionTmpSiNoExiste();
        
        $curso_pensum = Curso_pensum::findOrFail($id);
        $curso = Curso::findOrFail($curso_pensum->codigo_curso);
    
        return View('asignaciones.create', [
            "catedraticos" => $catedraticos,
            "id_asignacion_temporal" => $data['id_asignacion_temporal'],
            "curso_pensum" => $curso_pensum, 
            "curso" => $curso,
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
        $atc = new AsignacionTempController();
        $data = $atc->crearAsignacionTmpSiNoExiste();

        $asignaciontemp = new Curso_Asignacion_temporal;
        $asignaciontemp->id_curso_pensum = $request->get('id_curso_pensum');
        $asignaciontemp->catedratico_id = $request->get('catedratico_id');
        $asignaciontemp->asig_t_id = $data['id_asignacion_temporal']->id;
        $asignaciontemp->save();
        return Redirect::to('asignaciontemporal')->with('notice', 'Tarea guardada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignaciontemp = Curso_Asignacion_temporal::find($id);
        return View('asignaciones.show', ['asignaciontemp'=> $asignaciontemp]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catedraticos=DB::table('users as u')
        ->join('curso_catedratico as cc', 'u.id', '=', 'cc.codigo_catedratico')
        ->where('cc.curso_pensum', '=', $id)
        ->get();
        $atc = new AsignacionTempController();
        $data = $atc->crearAsignacionTmpSiNoExiste();
        
        $curso_pensum = Curso_pensum::findOrFail($id);
        $curso = Curso::findOrFail($curso_pensum->codigo_curso);

        $asignacion_temporal=Curso_asignacion_temporal::findOrFail($id);

        return View('asignaciones.edit', [
            'asignacion_temporal'=>$asignacion_temporal,
            'catedraticos'=>$catedraticos, 
            'id_asignacion_temporal'=>$data['id_asignacion_temporal'],
            'curso_pensum'=>$curso_pensum, 
            'method'=>'PUT'
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
    public function update(Request $request, $id)
    {
        $atc = new AsignacionTempController();
        $data = $atc->crearAsignacionTmpSiNoExiste();

        $asignaciontemp = Curso_Asignacion_temporal::findOrFail($id);
        $asignaciontemp->id_curso_pensum = $request->get('id_curso_pensum');
        $asignaciontemp->catedratico_id = $request->get('catedratico_id');
        $asignaciontemp->asig_t_id = $data['id_asignacion_temporal']->id;
        $asignaciontemp->save();
        return Redirect::to('asignaciontemporal')->with('notice', 'Tarea modificada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asignaciontemp = Curso_Asignacion_temporal::findOrFail($id);
        $asignaciontemp->delete();
        return Redirect::to('asignaciontemporal')->with('notice', 'Tarea elmiminada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function revision()
    {
        $atc = new AsignacionTempController();
        $data = $atc->crearAsignacionTmpSiNoExiste();
        
        $cursos=DB::table('curso as c')
        ->join('curso_pensum as cp', 'c.codigo_curso', '=', 'cp.codigo_curso')
        ->join('pensum as p', 'cp.codigo_pensum', '=', 'p.codigo_pensum')
        ->join('curso_asignacion_temporal as ctmp', 'ctmp.id_curso_pensum', '=', 'cp.id')
        ->select('cp.id as id_curso_p', 'c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
               'cp.categoria as categoria', 'cp.creditos as creditos', 'cp.restriccion as restriccion')
        ->where('ctmp.asig_t_id', '=', $data['id_asignacion_temporal']->id)
        ->paginate(7);

        
        return View('asignaciones.indexasig', ["cursos"=>$cursos, 
        "pensumestudiante"=>$data['pensumestudiante']->codigo_pensum, 
        "id_asignacion_temporal"=>$data['id_asignacion_temporal'], 
        "listado_asignacion_temporal"=>$data['listado_asignacion_temporal']]);
    }
    
}

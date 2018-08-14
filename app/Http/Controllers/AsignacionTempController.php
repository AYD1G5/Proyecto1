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

    function cursosAgregadosAsignacionTmp(){
        $id_asignacion_temporal = Asignacion_temporal::where('id_estudiante', Auth::id())->first();
            
        $listado_asignacion_temporal = DB::table('curso as c')
        ->join('curso_pensum as cupe', 'cupe.id_curso', '=', 'c.id_curso')
        ->join('pensum as pe', 'cupe.id_pensum', '=', 'pe.id_pensum')
        ->join('curso_asignacion_temporal as catmp', 'catmp.id_curso_pensum', '=', 'cupe.id_curso_pensum')
        ->select('cupe.id_curso_pensum as id_curso_pensum', 'c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
                'cupe.categoria as categoria', 'cupe.creditos as creditos', 'cupe.restriccion as restriccion')
        ->where('catmp.id_asignacion_temporal', '=', $id_asignacion_temporal);

        $pensumestudiante=DB::table('pensum_estudiante')
        ->where('id_estudiante', '=', Auth::id())
        ->first(); // los multipensum se implementaras despues
        
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
        $data = $atc->cursosAgregadosAsignacionTmp();

        $cursos=DB::table('curso as c')
        ->join('curso_pensum as cupe', 'cupe.id_curso', '=', 'c.id_curso')
        ->join('pensum as pe', 'cupe.id_pensum', '=', 'pe.id_pensum')
        ->select('cupe.id_curso_pensum as id_curso_pensum', 'c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
                'cupe.categoria as categoria', 'cupe.creditos as creditos', 'cupe.restriccion as restriccion')
        ->where('cupe.id_pensum', '=', $data['pensumestudiante']->id_pensum)
        ->paginate(7);

        $cursos_ya_agregados=DB::table('curso as c')
        ->join('curso_pensum as cupe', 'cupe.id_curso', '=', 'c.id_curso')
        ->join('pensum as pe', 'cupe.id_pensum', '=', 'pe.id_pensum')
        ->join('curso_asignacion_temporal as catmp', 'catmp.id_curso_pensum', '=', 'cupe.id_curso_pensum')
        ->select('cupe.id_curso_pensum as id_curso_pensum', 'c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
                'cupe.categoria as categoria', 'cupe.creditos as creditos', 'cupe.restriccion as restriccion', 
                'catmp.id_curso_asig_temp as id_curso_asig_temp')
        ->where('catmp.id_asignacion_temporal', '=', $data['id_asignacion_temporal']->id_asignacion_temporal)
        ->paginate(7);

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
    public function create($id)
    {
        $catedraticos=DB::table('users as u')
        ->join('curso_catedratico as cc', 'u.id', '=', 'cc.id_catedratico')
        ->where('cc.id_curso_pensum', '=', $id)
        ->get();
        $atc = new AsignacionTempController();
        $data = $atc->cursosAgregadosAsignacionTmp();
        
        $curso_pensum = Curso_pensum::findOrFail($id);
        $curso = Curso::findOrFail($curso_pensum->id_curso);
    
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
        $data = $atc->cursosAgregadosAsignacionTmp();

        $asignaciontemp = new Curso_Asignacion_temporal;
        $asignaciontemp->id_curso_pensum = $request->get('id_curso_pensum');
        $asignaciontemp->id_catedratico = $request->get('id_catedratico');
        $asignaciontemp->id_asignacion_temporal = $data['id_asignacion_temporal']->id_asignacion_temporal;
        $asignaciontemp->save();
        return Redirect::to('asignaciontemporal')->with('notice', 'Curso guardado correctamente.');
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
        //$asignaciontemp->id_curso_pensum = $request->get('id_curso_pensum');
        $asignaciontemp->catedratico_id = $request->get('catedratico_id');
        //$asignaciontemp->asig_t_id = $data['id_asignacion_temporal']->id;
        $asignaciontemp->update();
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
        $asignaciontemp = Curso_asignacion_temporal::find($id);
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
        $data = $atc->cursosAgregadosAsignacionTmp();

        $cursos_ya_agregados=DB::table('curso as c')
        ->join('curso_pensum as cupe', 'cupe.id_curso', '=', 'c.id_curso')
        ->join('pensum as pe', 'cupe.id_pensum', '=', 'pe.id_pensum')
        ->join('curso_asignacion_temporal as catmp', 'catmp.id_curso_pensum', '=', 'cupe.id_curso_pensum')
        ->select('cupe.id_curso_pensum as id_curso_pensum', 'c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
                'cupe.categoria as categoria', 'cupe.creditos as creditos', 'cupe.restriccion as restriccion')
        ->where('catmp.id_asignacion_temporal', '=', $data['id_asignacion_temporal']->id_asignacion_temporal)
        ->paginate(7);

        return View('asignaciones.indexasig', ["cursos"=>$cursos_ya_agregados, 
        "pensumestudiante"=>$data['pensumestudiante']->id_pensum, 
        "id_asignacion_temporal"=>$data['id_asignacion_temporal']]);
    }
    
}

<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\User;
use App\Ciclo;
use App\Asignacion;
use App\Curso;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CursoController extends Controller
{
    public function mostrarcurso($id)
    {
        $infocurso = DB::table('curso as c')
        ->join('curso_pensum as cupe', 'cupe.id_curso', '=', 'c.id_curso')
        ->select('cupe.id_curso_pensum as id_curso_pensum', 'c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
                'cupe.categoria as categoria', 'cupe.creditos as creditos', 'cupe.restriccion as restriccion')
        ->where('cupe.id_curso_pensum', '=', $id)
        ->first();

        $cursosprerequisito = DB::table('curso as c')
        ->join('curso_pensum as cupe', 'cupe.id_curso', '=', 'c.id_curso')
        ->join('curso_prerequisito as cuprer', 'cuprer.id_curso', '=', 'cupe.id_curso_pensum')
        ->select('cupe.id_curso_pensum as id_curso_pensum', 'c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
                'cupe.categoria as categoria', 'cupe.creditos as creditos', 'cupe.restriccion as restriccion')
        ->where('cuprer.id_curso_pensum', '=', $id)
        ->get();

        $cursospostrequisito = DB::table('curso as c')
        ->join('curso_pensum as cupe', 'cupe.id_curso', '=', 'c.id_curso')
        ->join('curso_prerequisito as cuprer', 'cuprer.id_curso_pensum', '=', 'cupe.id_curso_pensum')
        ->select('cupe.id_curso_pensum as id_curso_pensum', 'c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
                'cupe.categoria as categoria', 'cupe.creditos as creditos', 'cupe.restriccion as restriccion')
        ->where('cuprer.id_curso', '=', $id)
        ->get();

        return View('asignaciones.mostrarcurso', ['curso'=> $infocurso, 'prerequisitos'=> $cursosprerequisito
                                                , 'postrequisitos'=> $cursospostrequisito]);  
    }
}

<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class BuscadorCursoController extends Controller
{
    public function BuscadorCurso(Request $request){
        if($request)
        {     
            $query = trim($request->get('searchText'));
            $cursos=DB::table('curso as c')
            ->join('area as a', 'a.id_area', '=', 'c.id_area')
            ->join('escuela as e', 'e.id_escuela', '=', 'c.id_escuela')
            ->where('c.nombre_curso', 'LIKE', '%'.$query.'%')
            
            
            ->select('c.id_curso as id', 'c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
                    'e.nombre_escuela as escuela', 'a.nombre_area as area')
                    
            ->get();
            return view('BuscadorCurso',["cursos"=>$cursos,"searchText"=>$query]);
        }
    }

    public function PlanRepitencia(Request $request){
        if($request)
        {     
            $query = trim($request->get('searchText'));
            $cursos=DB::table('curso as c')
            ->join('area as a', 'a.id_area', '=', 'c.id_area')
            ->join('escuela as e', 'e.id_escuela', '=', 'c.id_escuela')
            ->join('curso_pensum as cp', 'cp.id_curso', '=', 'c.id_curso')
            ->join('curso_asignacion as ca', 'ca.id_curso_pensum', '=', 'cp.id_curso_pensum')
            ->where('c.nombre_curso', 'LIKE', '%'.$query.'%')
            ->select(DB::raw('count(*) as conteo, c.id_curso as id, c.codigo_curso as codigo_curso, c.nombre_curso as nombre_curso,
                    cp.id_curso_pensum, e.nombre_escuela as escuela, a.nombre_area as area'))   
            ->groupBy('c.id_curso', 'c.codigo_curso', 'c.nombre_curso', 'cp.id_curso_pensum', 'e.nombre_escuela', 'a.nombre_area')
            ->get();
            return view('ReporteRepitencia', ["cursos"=>$cursos,"searchText"=>$query]);
        }
    }
}



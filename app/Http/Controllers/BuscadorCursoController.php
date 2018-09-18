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
}



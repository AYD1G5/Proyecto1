<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\User;
use App\Ciclo;
use App\Asignacion;
use App\Curso;
use App\Curso_pensum;
class BuscadorCursoController extends Controller
{
    public function BuscadorCurso(Request $request){
        if($request)
        {     
            $query = trim($request->get('searchText'));
            $cursos=DB::table('curso as c')
            ->join('area as a', 'a.id_area', '=', 'c.id_area')
            ->join('curso_pensum as cp', 'cp.id_curso', '=', 'c.id_curso')
            ->join('escuela as e', 'e.id_escuela', '=', 'c.id_escuela')
            ->where('c.nombre_curso', 'LIKE', '%'.$query.'%')
            
            
            ->select('c.id_curso as id', 'c.codigo_curso as codigo_curso', 'c.nombre_curso as nombre_curso',
                    'cp.id_curso_pensum as id_curso_pensum', 'e.nombre_escuela as escuela', 'a.nombre_area as area')
                    
            ->get();
            return view('BuscadorCurso',["cursos"=>$cursos,"searchText"=>$query]);
        }
    }


    public function agregarCurso($codigo, $nombre, $id_escuela, $id_area, $id_pensum, $categoria, $creditos, $lab, $restriccion, $semestre){
        $curso=new Curso();
        $curso->codigo_curso=$codigo;
        $curso->nombre_curso=$nombre;
        $curso->id_escuela=$id_escuela;
        $curso->id_area=$id_area;
        $curso->save();

        $curso_pensum=new Curso_pensum();
        $curso_pensum->id_curso = $curso->id_curso;
        $curso_pensum->id_pensum = $id_pensum;
        $curso_pensum->categoria = $categoria;
        $curso_pensum->creditos = $creditos;
        $curso_pensum->laboratorioboolean = $lab;
        $curso_pensum->restriccion = $restriccion;
        $curso_pensum->semestre = $semestre;
        $curso_pensum->save();
        
        return $curso_pensum;
    }

    public function existeCurso($codigo_curso){
        $curso =Curso::where(array(
                'codigo_curso' => $codigo_curso
            ))->first();
        if($curso!=null){
                return true;
        }else{
                return false;
        }
    }


}



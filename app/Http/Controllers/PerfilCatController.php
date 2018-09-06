<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use Illuminate\Support\Facades\Redirect;
use App\ObjetoCatedratico;




class PerfilCatController extends Controller
{
    //
    /**
     * 
     * CONTROLADOR PARA LA VISTA DE PERFIL DE CATEDRATICO
     * 
     * DESARROLLADOR: DANIEL GARCIA
     */


    public function datosCatedratico()
    {

        $catedraticos=DB::table('users as u')
        ->join('rol as r', 'r.id_rol', '=', 'u.id_rol')
        ->select('u.id as id', 'u.registro_academico as registro', 'u.nombre as nombre_catedratico',
                'u.apellido as apellido_catedratico', 'u.direccion as direccion_catedratico', 'u.email as email_catedratico')
        ->first();

        /** BUSCAR TODOS LOS CURSOS DEL SEMESTRE */
        foreach ($catedraticos as &$catedratico) {
            /*** VER TODAS LAS ASIGNACIONES DEL USUARIO DE ESE CURSO PARA SABER LAS NOTAS */
            $asignaciones=DB::table('curso_catedratico as c')
                ->select('c.id_curso_catedratico as id_curso_catedratico','c.id_pensum as id_pensum')
                ->where('c.id_catedratico', '=', $catedratico->id)
                ->get();
        }

        $cursos_catedratico = DB::table('curso_catedratico as c')
        ->join(' as r', 'r.id_rol', '=', 'u.id_rol')
        ->select('u.id as id', 'u.registro_academico as registro', 'u.nombre as nombre_catedratico',
                'u.apellido as apellido_catedratico', 'u.direccion as direccion_catedratico', 'u.email as email_catedratico')
        ->get();

        /*
        $catedraticosCollection = new Collection();
        $str = ''; 

        foreach ($catedraticos as &$catedratico) {

            $objetoCatedratico = new ObjetoCatedratico();
            $objetoCatedratico->id_catedratico = $catedratico->id;
            $objetoCatedratico->registro_academico = $catedratico->registro;
            $objetoCatedratico->nombre_catedratico = $catedratico->nombre_catedratico;
            $objetoCatedratico->apellido_catedratico = $catedratico->apellido_catedratico;
            $objetoCatedratico->direccion_catedratico = $catedratico->direccion_catedratico;
            $objetoCatedratico->email_catedratico = $catedratico->email_catedratico;
            $catedraticosCollection->push($objetoCatedratico);
        }
        */

        return view('PerfilCatedratico')->with("arreglo",$catedraticosCollection);
    }


}

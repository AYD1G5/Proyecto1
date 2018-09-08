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
     */


    public function datosCatedratico($idCatedratico)
    {
        $datosCatedratico1=DB::table('users as u')
        ->select('u.id as id_catedratico', 'u.registro_academico as registro_catedratico', 'u.nombre as nombre_catedratico',
                'u.apellido as apellido_catedratico', 'u.direccion as direccion_catedratico', 'u.email as email_catedratico')
        ->where('u.id', '=', $idCatedratico)
        ->where('u.id_rol', '=', 1)
        ->get();

        $cursosPorCatedratico=DB::table('users as u')
        ->join('curso_catedratico as ccat', 'ccat.id_catedratico', '=', 'u.id')
        ->join('curso_pensum as cupe', 'cupe.id_curso_pensum', '=', 'ccat.id_curso_pensum')
        ->join('curso as cu', 'cu.id_curso', '=', 'cupe.id_curso')
        ->join('escuela as esc', 'esc.id_escuela', '=', 'cu.id_escuela')
        ->join('area as ar', 'ar.id_area', '=', 'cu.id_escuela')
        ->select('cu.codigo_curso as codigo_curso', 'cu.nombre_curso as nombre_curso', 'cupe.creditos as creditos_curso',
                'ar.nombre_area as nombre_area', 'esc.nombre_escuela as nombre_escuela')
        ->where('u.id', '=', $idCatedratico)
        ->where('u.id_rol', '=', 1)
        ->get();

        return view('PerfilCatedratico')->with(["datosCatedratico"=>$datosCatedratico1,
        "cursosPorCatedratico"=>$cursosPorCatedratico]);
    }


}

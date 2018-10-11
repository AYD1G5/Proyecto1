<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PerfilUsuarioController extends Controller
{
    //

    public function PerfilUsuario($idusuario)
    {
        $datosCatedratico1=DB::table('users as u')
        ->select('u.id as id_catedratico', 'u.registro_academico as registro_catedratico', 'u.nombre as nombre_catedratico',
                'u.apellido as apellido_catedratico', 'u.direccion as direccion_catedratico', 'u.email as email_catedratico')
        ->where('u.id', '=', $idusuario)
        ->where('u.id_rol', '=', 2)
        ->get();


        return view('PerfilUsuario')->with("datosCatedratico",$datosCatedratico1);
    }

}

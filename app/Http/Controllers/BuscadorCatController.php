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

class BuscadorCatController extends Controller
{
    //

    public function BuscadorCatedratico(Request $request){

        if($request)
        {     
            $query = trim($request->get('searchText'));
            $catedraticos=DB::table('users as u')
            
            ->where('u.id_rol', '=', '1')
            ->where('u.nombre', 'LIKE', '%'.$query.'%')
            
            ->select('u.id as id', 'u.registro_academico as registro', 'u.nombre as nombre_catedratico',
                    'u.apellido as apellido_catedratico', 'u.direccion as direccion_catedratico', 'u.email as email_catedratico')
                    
            ->get();
            return view('BuscadorCatedratico',["catedraticos"=>$catedraticos,"searchText"=>$query]);
        }
    }
}

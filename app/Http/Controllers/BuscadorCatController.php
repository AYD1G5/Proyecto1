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

    public function BuscadorCatedratico(){

        $catedraticos=DB::table('users as u')
        ->where('u.id_rol', '=', '1')
        ->select('u.id as id', 'u.registro_academico as registro', 'u.nombre as nombre_catedratico',
                'u.apellido as apellido_catedratico', 'u.direccion as direccion_catedratico', 'u.email as email_catedratico')
                
        ->get();

        /** INICIALIZAR LA COLECCION DE SALIDA */
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
        return view('BuscadorCatedratico')->with("arreglo",$catedraticosCollection);
    }
}

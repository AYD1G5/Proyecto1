<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuscadorPersonasController extends Controller
{
    //
    public function BuscadorPersonas(){
        return view('BuscadorPersonas');
    }
    public function ListarPersonas(Request $request){
        $persona = $request->input('busqueda');
        $busqueda = $request->input('busqueda');
        dd($persona);
        /*$personas=DB::table('users as u')
        ->where('u.id_rol', '=', '2')
        ->select('u.id as id', 'u.registro_academico as registro', 'u.nombre as nombre_persona',
                'u.apellido as apellido_persona', 'u.direccion as direccion_persona', 'u.email as email_persona')
                
        ->get();
         /** INICIALIZAR LA COLECCION DE SALIDA */
        /*$personasCollection = new Collection();
        $str = ''; 
         foreach ($personas as &$persona) {
             $objetopersona = new Objetopersona();
            $objetopersona->id_persona = $persona->id;
            $objetopersona->registro_academico = $persona->registro;
            $objetopersona->nombre_persona = $persona->nombre_persona;
            $objetopersona->apellido_persona = $persona->apellido_persona;
            $objetopersona->direccion_persona = $persona->direccion_persona;
            $objetopersona->email_persona = $persona->email_persona;
            $personasCollection->push($objetopersona);
        }
        return view('BuscadorPersonas')->with("arreglo",$personasCollection);*/
        return view('BuscadorPersonas');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuscadorTemasController extends Controller
{
    public function BuscadorTemas(){
        /*consulta temas
        return view('BuscadorPersonas')->with("arreglo",$personasCollection);*/
        return view('BuscadorTemas');
    }
    public function BuscadorTemas2(Request $request){
        $tema = $request->input('tema');
        dd($tema);
        /*consulta temas
        return view('BuscadorPersonas')->with("arreglo",$personasCollection);*/
        return view('BuscadorTemas');
    }
}

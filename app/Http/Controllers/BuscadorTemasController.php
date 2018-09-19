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
}

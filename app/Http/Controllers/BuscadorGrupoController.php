<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuscadorGrupoController extends Controller
{
    //
    public function BuscadorGrupo(){
        /*consulta Grupo
        return view('BuscadorGrupo')->with("arreglo",$grupoCollection);*/
        return view('BuscadorGrupo');
    }
}

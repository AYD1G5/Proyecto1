<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogoCarreraController extends Controller
{
    //este metodo lo utilizaremos para realizar la logica de la creacion de catalogo de carreras
    // dentro de la aplicacion
    public function CatalogoCarrera()
    {        
        return view('CatalogoCarrera');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreguntasFrecuentesController extends Controller
{
    //este metodo lo utilizaremos para realizar la logica preguntas frecuentes
    public function PreguntasFrecuentes()
    {
        
        return view('PreguntasFrecuentes');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PreguntasFrecuentes;
use DB;


class PreguntasFrecuentesController extends Controller
{
    //este metodo lo utilizaremos para realizar la logica preguntas frecuentes
    public function PreguntasFrecuentes()
    {
        $preguntas=DB::table('PreguntasFrecuentes')->get();

        return view('PreguntasFrecuentes')->with('Preguntas',$preguntas);

    }
    
    
    public function CrearPreguntasFrecuentes()
    {
        

        return view('CrearPreguntasFrecuentes');

    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //este metodo lo utilizaremos para guardar una nueva pregunta

    public function CrearPreguntasFrecuentes2(Request $request)
    {
        $pregunta=new PreguntasFrecuentes();
        $pregunta->pregunta=$request->input('pregunta');
        $pregunta->respuesta=$request->input('respuesta');
        $pregunta->save();
        return view('CrearPreguntasFrecuentes');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encuesta;
use Illuminate\Support\Facades\Redirect;

class Funciones extends Controller
{
    public function encuesta($curso, $catedratico){
        return view("encuesta");
    }
    public function encuestas(Request $request,$curso, $catedratico){
        $puntual = $request->input('puntual');
        $preparacion = $request->input('preparacion');
        $manejo = $request->input('manejo');
        $entendible = $request->input('entendible');
        $accesible = $request->input('accesible');
        $responsable = $request->input('responsable');
    
        $objeto=new Encuesta();
        $objeto->pregunta=1;
        $objeto->respuesta=$puntual;
        $objeto->curso = $curso;
        $objeto->catedratico=$catedratico;
        $objeto->save();
    
        $objeto=new Encuesta();
        $objeto->pregunta=2;
        $objeto->respuesta=$preparacion;
        $objeto->curso = $curso;
        $objeto->catedratico=$catedratico;
        $objeto->save();
    
        $objeto=new Encuesta();
        $objeto->pregunta=3;
        $objeto->respuesta=$manejo;
        $objeto->curso = $curso;
        $objeto->catedratico=$catedratico;
        $objeto->save();
    
        $objeto=new Encuesta();
        $objeto->pregunta=4;
        $objeto->respuesta=$entendible;
        $objeto->curso = $curso;
        $objeto->catedratico=$catedratico;
        $objeto->save();
    
        $objeto=new Encuesta();
        $objeto->pregunta=5;
        $objeto->respuesta=$accesible;
        $objeto->curso = $curso;
        $objeto->catedratico=$catedratico;
        $objeto->save();
    
        $objeto=new Encuesta();
        $objeto->pregunta=6;
        $objeto->respuesta=$responsable;
        $objeto->curso = $curso;
        $objeto->catedratico=$catedratico;
        $objeto->save();
        return Redirect::to('finalizarasignacion/');
     }
}

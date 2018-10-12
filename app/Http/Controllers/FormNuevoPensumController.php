<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\FormNuevoPensum;

class FormNuevoPensumController extends Controller
{
    //este metodo lo utilizaremos para realizar la logica del 
    // formulario de solicitud de Nuevo Pensum

    public function FormNuevoPensum()
    {        
        return view('FormNuevoPensum');

    }

    //este metodo lo utilizaremos para realizar la logica del 
    // formulario de solicitud de Nuevo Pensum
    //con método post para guardar la data enviada por el estudiante
    // que esta solicitando la apertura de un nuevo pensum

    public function FormNuevoPensumGuardar(Request $request)
    {   
        $pensum=new FormNuevoPensum();
        $pensum->nombre_pensum=$request->input('nombre');
        $pensum->codigo_pensum=$request->input('codigo');
        $pensum->id_carrera=$request->input('idcarrera');
        $pensum->save();

        return Redirect::to('/FormNuevoPensumConfir/');
    }

    // confirmacion de que se ha enviado la nueva solictud
    public function FormNuevoPensumConfir()
    {        
        return view('FormNuevoPensumConf');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ComentarioTema;
use Illuminate\Support\Facades\Redirect;

class ComentarioTemaController extends Controller
{
    //
    public function CrearComentario($tema,$comentario){
        $salida = new ComentarioTema();
        $salida->user_id = 1;
        $salida->tema_id = $tema;
        $salida->comentario = $comentario;
        $salida->save();
        return $salida;
    }
    public function ReportarComentario($id)
    {
        $comentario =ComentarioTema::where(array(
            'comentariotema_id' =>$id
        ))->first();
        $comentario->reportado=1;
        $comentario->save();
        return Redirect::to('/PerfilTema/'.$comentario->tema_id);
    }

    public function QuitarReporteComentario($id)
    {
        $comentario =ComentarioTema::where(array(
            'comentariotema_id' =>$id
        ))->first();
        $comentario->reportado=0;
        $comentario->save();
        return Redirect::to('/PerfilTema/'.$comentario->tema_id);
    }
}

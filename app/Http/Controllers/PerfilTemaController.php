<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tema;
use Illuminate\Support\Facades\Redirect;
use App\User;
class PerfilTemaController extends Controller
{
    public function PerfilTema($tema_id){
        return view("PerfilTema.PerfilTema")->with("tema", $this->AveriguarPerfilTema($tema_id))->with("creador", $this->ObtenerCreador($tema_id));
    }

    public function AveriguarPerfilTema($tema_id){
        $tema = Tema :: where(array(
            'tema' => $tema_id,
         ))->first();
         return $tema;
        //return Redirect::to('PerfilTema/1/')->with('notice', 'Curso guardado correctamente.');
    }
    
    public function ObtenerCreador($tema_id){
        $tema = Tema :: where(array(
            'tema' => $tema_id,
         ))->first();
         if($tema==null){
             return null;
         }
        $estudiante = User:: where(array(
            'id' => $tema->creador_id,
         ))->first();
         return $estudiante;
      //  dump($estudiante);
    }

}

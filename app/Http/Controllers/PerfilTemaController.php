<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tema;
use Illuminate\Support\Facades\Redirect;
class PerfilTemaController extends Controller
{
    public function PerfilTema($tema_id){
        return view("PerfilTema.PerfilTema")->with("tema", $this->AveriguarPerfilTema($tema_id));
    }

    public function AveriguarPerfilTema($tema_id){
        $tema = Tema :: where(array(
            'tema' => $tema_id,
         ))->first();
         return $tema;
        //return Redirect::to('PerfilTema/1/')->with('notice', 'Curso guardado correctamente.');
    }

}

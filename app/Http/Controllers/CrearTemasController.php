<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Tema;
class CrearTemasController extends Controller
{
    //
    public function index()
    {      
        return view('CrearTemas');
    }
    public function guardar(Request $request,$id)
    {
        $tema = new Tema();
        $nombre = $request->input('nombre');
        $desc = $request->input('desc');
        $tema->nombre_tema=$nombre;
        $tema->descripcion=$desc;
        $tema->creador_id=Auth::id();
        $tema->curso_id=$id;
        $tema->save();
        //$grupo = $request->input('grupo');

        //dd($titulo.$desc.Auth::id());
        return Redirect::to('/');
    }


}

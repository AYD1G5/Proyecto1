<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;
use DB;


class BuscadorGrupoController extends Controller
{
    //
    public function BuscadorGrupo(){
        /*consulta Grupo
        return view('BuscadorGrupo')->with("arreglo",$grupoCollection);*/
        $grupo=[];
        return view('BuscadorGrupo')->with('grupos',$grupo);
    }


    public function BuscadorGrupo2(Request $request){
        $nombre = $request->input('grupo');
        $opciones = $request->input('opcion');
        $partes = explode("-", $nombre);
        $grupo=[];
        if(count($partes)==2 && $opciones=='BUSCAR')
        {
            
            $grupo=DB::table('grupo')->Where('id_grupo','=',$partes[1])->get();            
        }

        /*consulta Grupo


        return view('BuscadorGrupo')->with("arreglo",$grupoCollection);*/
        return view('BuscadorGrupo')->with('grupos', $grupo);
    }
}

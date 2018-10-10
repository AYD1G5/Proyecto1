<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Grupo;
use App\Estudiante_Grupo;
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
        $grupo=[];
            $nombre = $request->input('grupo');
            $opciones = $request->input('opcion');
            $partes = explode("-", $nombre);
            
            if(count($partes)==2)
            {                
                $grupo=DB::table('grupo')->Where('nombre','=',$partes[0])->Where('id_Grupo','=',$partes[1])->get();            
            }
            
            
        /*consulta Grupo


        return view('BuscadorGrupo')->with("arreglo",$grupoCollection);*/
        return view('BuscadorGrupo')->with('grupos', $grupo);
    }


    public function BuscadorGrupo3(Request $request,$id){
        $exite=DB::table('estudiante_grupo')->where('id_Grupo','=',$id)->where('id_Estudiante','=',Auth::id())->get();

        if($exite->isEmpty())
        {
            $estudianteGrupo=new Estudiante_Grupo();
            $estudianteGrupo->id_Estudiante=Auth::id();
            $estudianteGrupo->id_Grupo=$id;
            $estudianteGrupo->save();        
        }
                return Redirect::to('/PerfilGrupo/');
    }


}

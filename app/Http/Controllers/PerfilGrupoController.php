<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Grupo;
use App\Tema_Grupo;
use App\Comentario_Grupo;



class PerfilGrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * En este método se retornara la vista con el listado de grupos a los que pertence el usuario
     * */
    public function PerfilGrupo()
    {
        $Grupos=DB::table('grupo as G')
        ->join('Estudiante_Grupo as EG', 'EG.id_Grupo', '=', 'G.id_Grupo')
        ->where('EG.id_Estudiante', '=', Auth::id())->get();
        /**
         * retorno de la vista de grupos a los que pertenece el usuario
         * */        
        return view('perfilGrupo')->with("GruposVector",$Grupos)->with("contador",0);
                
    }

    /**
     * En este método se retornara la vista con el listado de temas que estan asociados
     * al grupo que se esta consultado y al que pertence el usuario
     * */
    public function TemaGrupo($id)
    {
     /**
     * Consultas a la base de datos 
     * */
        $Grupo=DB::table('grupo')->where('id_Grupo', '=',$id)->get();
        $GrupoName="";
        $NoTemas="";
        $Temas =[];
        foreach ($Grupo as &$G1)
        { 
            $GrupoName=$G1->nombre;
        }

        if($this->ExisteTema($id))
        {
            $Temas = Tema_Grupo::where('id_Grupo',$id)->get();
        }
        else{$NoTemas= "NO SE HA CREADO NINGUN TEMA A ESTE GRUPO";}

        
        /**
         * retorno de la vista de Temas asociados a un grupo
         * */        
        return view('TemaGrupo')->with("TemasVector",$Temas)->with("GrupoName",$GrupoName)->with("NoTemas",$NoTemas);
        
    }
    /**
     * En este método se retornara la vista con el listado de comentarios que 
     * relacionados con un tema
     * */
    public function ComentarioGrupo($id)
    {
        $GrupoName="";
        $TemaName="";
        $NoTemas="";
        $Comentarios =[];

     /**
     * Consultas a la base de datos 
     * */

        $Temas = DB::table('Tema_Grupo')->where('id_Tema_Grupo', '=',$id)->get();
        
        foreach ($Temas as &$T1)
        { 
            /**
             * llenar el nombre del Grupo con el grupo que se esta consultando
             * */  
            $Grupo=DB::table('grupo')->where('id_Grupo', '=',$T1->id_Grupo)->get();
            foreach ($Grupo as &$G1)
            { 
                $GrupoName=$G1->nombre;
            }
            $TemaName=$T1->Titulo;            
        }

        if($this->ExisteComentario($id))
        {
            $Comentarios = DB::table('Comentario_Grupo as CG')
            ->join('users as U', 'CG.id_estudiante', '=', 'U.id')->where('id_Tema_Grupo',$id)->get();            
        }
        
        else{$NoTemas= "NO SE HA CREADO NINGUN COMENTARIO A ESTE TEMA";}

     /**
     * Regreso de la vista Comentarios 
     * */        
        return view('ComentarioGrupo')->with("ComentariosVector",$Comentarios)->with("GrupoName",$GrupoName)->with("TemaName",$TemaName)->with("NoTemas",$NoTemas);
        
    }
    
     /**
     * Metodo para verificar si exiten temas en un grupo
     * */        
    public function ExisteTema($idGrupo)
    {
        $respuesta=false;
        $Temas = Tema_Grupo::where('id_Grupo',$idGrupo)->get();

        if(!$Temas->isEmpty())
        {
            $respuesta=true;
        }

        return $respuesta;
    }

     /**
     * Metodo para verificar si exiten comentarios en un tema
     * */        
    public function ExisteComentario($idTema)
    {
        $respuesta=false;
        $Comentarios = Comentario_Grupo::where('id_Tema_Grupo',$idTema)->get();

        if(!$Comentarios->isEmpty())
        {
            $respuesta=true;
        }

        return $respuesta;
    }




    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

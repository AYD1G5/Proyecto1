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

    public function PerfilGrupo()
    {
        $Grupos=DB::table('grupo as G')
        ->join('Estudiante_Grupo as EG', 'EG.id_Grupo', '=', 'G.id_Grupo')
        ->where('EG.id_Estudiante', '=', Auth::id())->get();

        

        return view('perfilGrupo')->with("GruposVector",$Grupos)->with("contador",0);
        
    }

    public function TemaGrupo($id)
    {

        return view('TemaGrupo');
        
    }

    public function ComentarioGrupo($id)
    {
        

        return view('ComentarioGrupo');
        
    }
    
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

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Grupo;
use DB;

class CrearGrupoController extends Controller
{
    //este metodo lo utilizaremos para realizar la logica de la creacion de grupos dentro de la aplicacion
    public function CrearGrupo()
    {
        
        return view('CrearGrupo.CrearGrupo');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //este metodo lo utilizaremos para guardar el nuevo grupo que se ha creado
    public function GuardarGrupo(Request $request)
    {
        $grupo=new Grupo();
        $grupo->nombre=$request->input('nombre');
        $grupo->id_Creador_Grupo=Auth::id();
        $grupo->save();
        
        return Redirect::to('/CodigoGrupo/'.$grupo->id_Grupo.'/');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Metodo para devolver el codigo del grupo creado
    public function CodigoGrupo($id)
    {
        $grupo=Grupo::where('id_grupo',$id)->first();
        $respuesta=$grupo->nombre .'-' .$grupo->id_Grupo;
        return view('CrearGrupo.RespuestaGrupo')->with('Respuesta',$respuesta);
    }






    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * En este método se retornara la vista con el listado de grupos creados por el usuario
     * */
    public function GruposCreados()
    {
        $Grupos=DB::table('grupo as G')
        ->where('G.id_creador_grupo', '=', Auth::id())->get();
        /**
         * retorno de la vista de grupos que ha creado el usuario
         * */        
        return view('CrearGrupo.GruposCreados')->with("GruposVector",$Grupos)->with("contador",0);                
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
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

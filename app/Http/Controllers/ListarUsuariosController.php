<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ListarUsuariosController extends Controller
{
  /*
  * Con esta funcion esperamos listar los cursos que que el usuario tenga ganado
  *durante semestres anteriores o semestres actuales
  */
  public function ListarUsuarios($id){
      $cursos = $this->semestre($id);
      $totalCursos = 0;
      $cursosGanados =0;
      $cursosPendientes = 0;
      foreach ($cursos as $curso){
          // Code Here
          if($curso->estado=="GANADO"){
              $cursosGanados++;
          }else{
              $cursosPendientes ++;
          }
          $totalCursos++;
      }
      $tipo="";
      if($cursosGanados>0){
          if($cursosPendientes==0){
              $tipo="VERDE"; //Verde No hay pendientes
          }else{
              $tipo="AMARILLO"; //Amarillo Faltan
          }
      }else{
          $tipo = "ROJO"; //Rojo
      }
    //  die($cursos);
    return $tipo;
  }

  public function ListarUsuarioOficiales(){
    $Usuarios = User::where(array(
        'id_rol' => 2
      ))->get();
    return view('ListarUsuarios')->with('Usuarios', $Usuarios);
  }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

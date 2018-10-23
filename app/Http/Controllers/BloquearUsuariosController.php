<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class BloquearUsuariosController extends Controller
{
    //
    public function Listar(){
        $Usuarios = User::where(array(
            'id_rol' => 2
          ))->get();
        return view('BloquearUsuarios')->with('Usuarios', $Usuarios);
      }
    public function Bloquear($id){
        $Usuarios = User::where(array(
            'id' => $id
          ))->first();
        $Usuarios->bloqueado=1;
        $Usuarios->save();
        return \redirect("/ListarUsuarios2");
      }
      public function Desbloquear($id){
        $Usuarios = User::where(array(
            'id' => $id
          ))->first();
        $Usuarios->bloqueado=0;
        $Usuarios->save();
        return \redirect("/ListarUsuarios2");
      }
}

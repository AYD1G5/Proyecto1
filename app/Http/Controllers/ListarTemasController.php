<?php

namespace App\Http\Controllers;

use App\Tema;
use DB;

use Illuminate\Http\Request;

class ListarTemasController extends Controller
{
    //
    public function index()
    {      
         
        $temas=DB::table('temas as tem')
        ->join('users as user', 'user.id', '=', 'tem.creador_id')
        ->join('curso as c', 'tem.curso_id', '=', 'c.id_curso')
        ->select('tema', 'nombre_tema','tem.descripcion', 'user.nombre as nombre_user',
                'c.nombre_curso as nombre_curso')
        ->get();
        return view('ListarTemas')->with('temas', $temas);
    }
}

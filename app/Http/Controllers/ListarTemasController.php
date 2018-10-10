<?php

namespace App\Http\Controllers;

use App\Tema;

use Illuminate\Http\Request;

class ListarTemasController extends Controller
{
    //
    public function index()
    {      
         

        $temas = Tema::all();
        dd($temas);
        return view('ListarTemas')->with('temas', $temas);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListarTemasController extends Controller
{
    //
    public function index()
    {      
         
        return view('ListarTemas');
    }
}

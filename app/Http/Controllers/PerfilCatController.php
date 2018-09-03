<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilCatController extends Controller
{
    //
    /**
     * 
     * CONTROLADOR PARA LA VISTA DE PERFIL DE CATEDRATICO
     * 
     * DESARROLLADOR: DANIEL GARCIA
     */


    public function datosCatedratico()
    {
        return view('PerfilCatedratico');
    }


}

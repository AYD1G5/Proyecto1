<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use DB;
use Auth;
use App\Carrera;
use App\User;

class CatalogoCarreraController extends Controller
{
    //este metodo lo utilizaremos para realizar la logica de la creacion de catalogo de carreras
    // dentro de la aplicacion
    public function CatalogoCarrera()
    {        
        $carreras=DB::table('Carrera')->get();
        return view('CatalogoCarrera')->with('Carreras',$carreras);

    }

    //este metodo lo utilizaremos para realizar la logica de la creacion de catalogo de Pensums
    // dentro de la aplicacion
    public function CatalogoPensum()
    {   
        $carreras=DB::table('Carrera')->get();
        $pensums=DB::table('pensum')->get();
        return view('CatalogoPensum')->with('Carreras',$carreras)->with('Pensums',$pensums);

    }

    //este metodo lo utilizaremos para realizar la logica de la creacion de catalogo de carreras
    // dentro de la aplicacion
    public function CatalogoCarrera2()
    {        
        $carreras=DB::table('Carrera')->get();
        return view('CatalogoCarrera')->with('Carreras',$carreras);

    }

    //este metodo lo utilizaremos para realizar la logica de la creacion de catalogo de Pensums
    // dentro de la aplicacion
    public function CatalogoPensum2()
    {   
        $carreras=DB::table('Carrera')->get();
        $pensums=DB::table('pensum')->get();
        return view('CatalogoPensum')->with('Carreras',$carreras)->with('Pensums',$pensums);

    }



}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use DB;
use Auth;
use App\Carrera;
use App\Pensum;
use App\User;
use App\Solicitud;

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
        $pensums=DB::table('pensum')
        ->join('Carrera', 'pensum.id_carrera', '=', 'Carrera.id_carrera')
        ->get();

        return view('CatalogoPensum')->with('Carreras',$carreras)->with('Pensums',$pensums);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //este metodo lo utilizaremos para guardar la nueva carrera creada
    
    public function CatalogoCarrera2(Request $request)
    {
        $carrera=new Carrera();
        $carrera->nombre_carrera=$request->input('nombre');
        $carrera->codigo_carrera=$request->input('codigo');
        $carrera->save();
    
        $carreras=DB::table('Carrera')->get();
        return view('CatalogoCarrera')->with('Carreras',$carreras);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //este metodo lo utilizaremos para guardar el nuevo pensum creado

    public function CatalogoPensum2(Request $request)
    {   
        $pensum=new Pensum();
        $pensum->nombre_pensum=$request->input('nombre');
        $pensum->codigo_pensum=$request->input('codigo');
        $pensum->id_carrera=$request->input('Carrera');
        $pensum->save();

        $carreras=DB::table('carrera')->get();
        $pensums=DB::table('pensum')
            ->join('Carrera', 'pensum.id_carrera', '=', 'Carrera.id_carrera')
            ->get();

        return view('CatalogoPensum')->with('Carreras',$carreras)->with('Pensums',$pensums);

    }


    //este metodo lo utilizaremos para crear la vista de las solicitudes que han hecho los usuaro
    //para la apertura de nuevas carreras

    public function VerSolicitudes()
    {   
        $solicitudes=DB::table('form_nuevo_pensum')->get();

        return view('VerSolicitudes')->with('Solicitudes',$solicitudes);

    }


}

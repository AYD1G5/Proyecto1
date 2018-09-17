<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\AppExterna;

class AppExternaController extends Controller
{

    public function AppExterna()
    {
        $AppExterna = [];
        if($this->ExisteApp())
        {
            $AppExterna = DB::table('AppExterna')->get();
        }

        return view('AppExterna')->with("AppExternaVector",$AppExterna);    
        
    }

    /**
     * Metodo para verificar si exiten Applicaciones externas avaladas
     * para usarse en la aplicación
     * 
     * */
    public function ExisteApp()
    {
        $respuesta=false;
        $AppExterna = DB::table('AppExterna')->get();

        if(!$AppExterna->isEmpty())
        {
            $respuesta=true;
        }
        return $respuesta;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AppExterna');    
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
        return view('AppExterna');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('AppExterna');    
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

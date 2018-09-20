<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use DB;
use Auth;
use App\AppExterna;
use App\User;


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

    public function WhatssApp()
    {

        $usuarios = [];
       
        $usuarios = DB::table('users')->get();
        if($usuarios->isEmpty())
        {
            $usuarios = [];
        }

        return view('AppExternaWhatsApp')->with("usuariosVector",$usuarios);
        
    }

    public function EnviarWhatssApp(Request $request)
    {
        $whatssAppURL="https://api.whatsapp.com/send?phone=";
        
        $texto0 = $request->input('texto');
        $telefono = $request->input('Amigo');
        $texto1=str_replace(" ", "%20", $texto0);


return        redirect()->away($whatssAppURL.$telefono."&text=".$texto1);

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

    public function videochat(){        
        return view('VideoChat');
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

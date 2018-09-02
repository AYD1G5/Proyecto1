<?php

namespace App\Http\Controllers;
use Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Curso_pensum;

class MaterialDeApoyoController extends Controller {
   public function listarMaterial($id_curso){
      return view('curso.materialApoyo.listarSubirMaterial');
   }
   public function subirArchivo(Request $request){
      $file = $request->file('image');
   
      //Display File Name
      echo 'File Name: '.$file->getClientOriginalName();
      echo '<br>';
   
      //Display File Extension
      echo 'File Extension: '.$file->getClientOriginalExtension();
      echo '<br>';
   
      //Display File Real Path
      echo 'File Real Path: '.$file->getRealPath();
      echo '<br>';
   
      //Display File Size
      echo 'File Size: '.$file->getSize();
      echo '<br>';
   
      //Display File Mime Type
      echo 'File Mime Type: '.$file->getMimeType();
      echo '<a href="/curso/material/descargarmaterialdeapoyo/1/" class="btn btn-large pull-right"><i class="icon-download-alt"> </i> Download Brochure </a>';
   
      //Move Uploaded File
      $destinationPath = 'materialSubido/'.date("Y").'/'.date("m");
      $file->move($destinationPath, $file->getClientOriginalName());
    }
    
    public function descargarArchivo($id_archivo)
    {
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/materialSubido/2018/09/Tarea3_201503666.pdf";
        $extension = "pdf";
        $nombre_archivo = "tarea3.pdf";
        $headers = array(
                'Content-Type: application/'.$extension,
                );

        return Response::download($file, $nombre_archivo, $headers);
    }
}
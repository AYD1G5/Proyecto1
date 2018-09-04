<?php

namespace App\Http\Controllers;
use Response;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Curso_pensum;
use App\Curso;
use App\Material;
use App\Material_curso;

class MaterialDeApoyoController extends Controller {
   
    public function listarMaterial($id_curso_pensum){
        $curso_pensum = Curso_pensum::findOrFail($id_curso_pensum);
        $curso = Curso::findOrFail($curso_pensum->id_curso);
        $materialPorCurso=DB::table('material as mat')
        ->join('material_curso as matxcurso', 'matxcurso.id_material', '=', 'mat.id_material')
        ->join('curso_pensum as cupe', 'matxcurso.id_curso_pensum', '=', 'cupe.id_curso_pensum')
        ->join('curso as cu', 'cu.id_curso', '=', 'cupe.id_curso')
        ->select('mat.id_material as id_material', 'mat.nombre_archivo as nombre_archivo',
                'mat.tamano_archivo as tamano_archivo', 'mat.descripcion_archivo as descripcion_archivo',
                'cu.codigo_curso as codigo_curso', 'cu.nombre_curso as nombre_curso' )
        ->where('matxcurso.id_curso_pensum', '=', $id_curso_pensum)
        ->orderByRaw('mat.id_material DESC')
        ->get();
        return view('curso.materialApoyo.listarSubirMaterial', ["materialporcurso"=>$materialPorCurso, 
                "id_curso_pensum"=>$id_curso_pensum, "nombre_curso"=>$curso->nombre_curso]);
   }
   public function subirArchivo($id_curso_pensum, Request $request){
        $curso_pensum = Curso_pensum::findOrFail($id_curso_pensum);   
        $file = $request->file('archivo');
        $material = new Material;
        $material->nombre_archivo = $file->getClientOriginalName();
        $material->extension_archivo = $file->getClientOriginalExtension();
        $material->ruta_real_archivo = 'materialSubido/'.date("Y").'/'.date("m").'/'.$file->getClientOriginalName();
        $material->tamano_archivo = $file->getSize();
        $material->descripcion_archivo = ' ';
        $material->save();

        $material_curso = new Material_curso;   
        $material_curso->id_curso_pensum = $id_curso_pensum;
        $material_curso->id_material = $material->id_material;
        $material_curso->save();
        
        //Mover el archivo subido
        $destinationPath = 'materialSubido/'.date("Y").'/'.date("m");
        $file->move($destinationPath, $file->getClientOriginalName());
        
        return Redirect::to('/curso/material/listarmaterialdeapoyo/'.$id_curso_pensum.'/')->with('notice', 'Archivo Subido Correctamente.');
    /*//Display File Name
      $file = $request->file('image');
      echo 'File Name: '.$file->getClientOriginalName();
      echo '<br>';
      //Display File Extension
      echo 'File Extension: '.$file->getClientOriginalExtension();
      //Display File Real Path
      echo 'File Real Path: '.$file->getRealPath();
      //Display File Size
      echo 'File Size: '.$file->getSize();
      //Display File Mime Type
      echo 'File Mime Type: '.$file->getMimeType();
    */
    }
    
    public function descargarArchivo($id_archivo)
    {
        //PDF file is stored under project/public/download/info.pdf
        $material = Material::findOrFail($id_archivo);
        $file= public_path().'/'.$material->ruta_real_archivo;
        $nombre_archivo = $material->nombre_archivo;
        $headers = array(
                'Content-Type: application/'.$material->extension_archivo,
                );

        return Response::download($file, $nombre_archivo, $headers);
    }
}
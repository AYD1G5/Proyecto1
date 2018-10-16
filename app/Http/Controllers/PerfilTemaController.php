<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tema;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Curso;
use App\ComentarioTema;
use App\ObjetoComentario;
use Illuminate\Support\Collection;

class PerfilTemaController extends Controller
{
    public function PerfilTema($tema_id){
        return view("PerfilTema.PerfilTema")->with("tema", $this->AveriguarPerfilTema($tema_id))->with("creador", $this->ObtenerCreador($tema_id))->with("curso", $this->ObtenerCurso($tema_id))->with("comentarios", $this->ObtenerComentariosTema($tema_id));
    }

    public function AveriguarPerfilTema($tema_id){
        $tema = Tema :: where(array(
            'tema' => $tema_id,
         ))->first();
         return $tema;
        //return Redirect::to('PerfilTema/1/')->with('notice', 'Curso guardado correctamente.');
    }
    
    public function ObtenerCreador($tema_id){
        $tema = Tema :: where(array(
            'tema' => $tema_id,
         ))->first();
         if($tema==null){
             return null;
         }
        $estudiante = User:: where(array(
            'id' => $tema->creador_id,
         ))->first();
         return $estudiante;
      //  dump($estudiante);
    }

    public function ObtenerCurso($tema_id){
        $tema = Tema :: where(array(
            'tema' => $tema_id,
         ))->first();
         if($tema==null){
             return null;
         }
        $curso = Curso:: where(array(
            'id_curso' => $tema->curso_id,
         ))->first();
         return $curso;
      //  dump($estudiante);
    }
    public function ObtenerComentariosTema($tema_id){
        $tema = Tema :: where(array(
            'tema' => $tema_id,
         ))->first();
         if($tema==null){
             return null;
         }
        $comentarios = ComentarioTema:: where(array(
            'tema_id' => $tema->tema,
         ))->get();
      //   dump($comentarios);
         $comentarioCollection = new Collection();
        foreach ($comentarios as &$comentario){
            $estudiante = User:: where(array(
                'id' => $comentario->user_id,
             ))->first();
            $objetoComentario = new ObjetoComentario();
            $objetoComentario->autor = $estudiante;
            $objetoComentario->comentario = $comentario;
            $comentarioCollection->push($objetoComentario);
        }
         return $comentarioCollection;
      //  dump($estudiante);
    }
    public function ExistePerfil($tema_id){
        $tema = Tema :: where(array(
            'tema' => $tema_id,
         ))->first();
         if($tema==null){
             return false;
         }else{
             return true;
         }
    }
    public function ExisteComentario($tema_id){
        $tema = Tema :: where(array(
            'tema' => $tema_id,
         ))->first();
         if($tema==null){
             return false;
         }
        $comentario = ComentarioTema:: where(array(
            'tema_id' => $tema->tema,
         ))->first();
         if($comentario==null){
            return false;
        }else{
            return true;
        }
    }
    public function CrearTema($curso,$creador,$titulo,$descripcion){
        $tema = new Tema();
        $tema->curso_id = $curso;
        $tema->creador_id = $creador;
        $tema->nombre_tema = $titulo;
        $tema->descripcion = $descripcion;
        $tema->reportado = 0;
        $tema->save();
        return $tema;
    }
    public function ReportarTema($idTema){
        $Tema1 = Tema::where(array(
            'tema' => $idTema
            ))->first();
        $Tema1->reportado = 1;
        $Tema1->save();
    }
    public function QuitarReporteTema($idTema){
        $Tema1 = Tema::where(array(
            'tema' => $idTema
            ))->first();
        $Tema1->reportado = 0;
        $Tema1->save();
    }
  
}

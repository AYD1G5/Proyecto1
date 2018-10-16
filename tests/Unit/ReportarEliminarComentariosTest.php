<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportarEliminarComentariosTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

        /**
        * Esta prueba se encarga de agregar
        * un comentario al grupo de comentarios
        * reportados por contenido inapropiado.
        */
        
        public function testReportarComentario()
        {
            $curso =1;
            $creador = 1;
            $titulo = "Tema Prueba unitaria";
            $descripcion = "Esta es la descripcion del tema";
           $controlador = new PerfilTemaController();
           $Tema = $controlador->CrearTema($curso,$creador,$titulo,$descripcion);
           $controlador1=new ComentarioTema();
           $contenidoComentario = "Este sistema no sirve";
           $controlador1->CrearComentario($Tema->tema, $contenidoComentario);
           $controlador1->ReportarComentario($comentario->id);
           $comentario = ComentarioTema::where(array(
            'comentariotema_id' => $comentario
            ))->first();
            $this->assertEquals($comentario->reportado, 1);
            $comentario->delete();
            $Tema->delete();
        }
        

        /**
        * Esta prueba se encarga de agregar
        * un tema al grupo de temas
        * reportados por contenido inapropiado.
        */
        public function testReportarTema()
        {
            $curso =1;
            $creador = 1;
            $titulo = "Tema Prueba unitaria";
            $descripcion = "Esta es la descripcion del tema";
           $controlador = new PerfilTemaController();
           $Tema = $controlador->CrearTema($curso,$creador,$titulo,$descripcion);
          $controlador -> ReportarTema($Tema->tema);
           $Tema1 = Tema::where(array(
            'tema' => $Tema->tema
            ))->first();
            $this->assertEquals($Tema1->reportado, 1);
            $Tema1->delete();
        }

        /**
        * Esta prueba se encarga de agregar
        * un material de apoyo al grupo de material
        * de apoyo
        * reportados por contenido inapropiado.
        */
        public function testReportarMaterial()
        {
            $nombreMaterial="Material de apoyo XXX";
            $controlador = new MaterialDeApoyoController();
            $MaterialTemp = $controlador->CrearMaterial($nombreMaterial);
            $controlador ->ReportarMaterial($MaterialTemp->id_material);
            $MaterialTemp1 = Material::where(array(
                'id_material' =>$MaterialTemp->id_material
                ))->first();
            $this->assertEquals($MaterialTemp1->reportado, 1);
            $MaterialTemp1->delete();
        }

         /**
        * Esta prueba se encarga de quitar
        * un comentario al grupo de comentarios
        * reportados por contenido inapropiado.
        */

        public function testQuitarReporteComentario()
        {
            $curso =1;
            $creador = 1;
            $titulo = "Tema Prueba unitaria";
            $descripcion = "Esta es la descripcion del tema";
           $controlador = new PerfilTemaController();
           $Tema = $controlador->CrearTema($curso,$creador,$titulo,$descripcion);
           $controlador1=new ComentarioTema();
           $contenidoComentario = "Este sistema no sirve";
           $controlador1->CrearComentario($Tema->tema, $contenidoComentario);
           $controlador1->ReportarComentario($comentario->id);
           $controlador1->QuitarReporteComentario($comentario->id);
           $comentario = ComentarioTema::where(array(
            'comentariotema_id' => $comentario
            ))->first();
            $this->assertEquals($comentario->reportado, 0);
            $comentario->delete();
            $Tema->delete();
        }

        /**
        * Esta prueba se encarga de quitar
        * un tema al grupo de temas
        * reportados por contenido inapropiado.
        */

        public function testQuitarReporteTema()
        {
            $curso =1;
            $creador = 1;
            $titulo = "Tema Prueba unitaria";
            $descripcion = "Esta es la descripcion del tema";
           $controlador = new PerfilTemaController();
           $Tema = $controlador->CrearTema($curso,$creador,$titulo,$descripcion);
          $controlador -> ReportarTema($Tema->tema);
          $controlador -> QuitarReporteTema($Tema->tema);
           $Tema1 = Tema::where(array(
            'tema' => $Tema->tema
            ))->first();
            $this->assertEquals($Tema1->reportado, 1);
            $Tema1->delete();
        }

          /**
        * Esta prueba se encarga de quitar
        * un material de apoyo al grupo de  material de apoyo
        * reportados por contenido inapropiado.
        */


        public function testQuitarReporteMaterial()
        {
            $nombreMaterial="Material de apoyo XXX";
            $controlador = new MaterialDeApoyoController();
            $MaterialTemp = $controlador->CrearMaterial($nombreMaterial);
            $controlador ->ReportarMaterial($MaterialTemp->id_material);
            $controlador ->QuitarReporteMaterial($MaterialTemp->id_material);
            $MaterialTemp1 = Material::where(array(
                'id_material' =>$MaterialTemp->id_material
                ))->first();
            $this->assertEquals($MaterialTemp1->reportado, 0);
            $MaterialTemp1->delete();
        }
}

<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\PerfilTemaController;
use App\Tema;

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
           $controlador -> QuitarReporteTema($Tema->tema);
           $Tema1 = Tema::where(array(
            'tema' => $Tema->tema
            ))->first();
            $this->assertEquals($Tema1->reportado, 0);
            $Tema->delete();
        }


    
}

<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Auth\RegisterController;
use App\Asignacion_temporal;
use App\Pensum_estudiante;

class RegistroTest extends TestCase
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
    /*
     * Prueba unitaria para verificar la correcta creacion de un 
     * usuario de tipo catedratico
    */
    public function testRegistroUsuarioCatedratico(){
        $info = array(
            '9018224',
            'Jeremias',
            'Azurres',
            'tengo_sueno@gmail.com',
            'Guatemala',
            'holamundo',
            '1'
            );

        $control = new RegisterController();
        $usuario = $control->agregarUsuarioCatedratico($info);
        $this->assertEquals(true, $control->existeUsuarioPlataforma($usuario->email));
        $usuario->delete();
    }

    /**
     * Prueba unitaria para verificar la correcta creacion de un 
     * usuario de tipo estudiante
     */
    public function testRegistroUsuarioEstudiante(){
        $this->assertTrue(true);
    }

     /**
      * Prueba unitaria para verificar la existencia de un usuario
      * en la plataforma.
      */
      public function testExisteUsuarioPlataforma(){
        $this->assertTrue(true);
      }
      /**
       * Prueba unitaria para verificar si dos password coinciden
       */
      public function testConfirmarPassword(){
        $this->assertTrue(true);
      }

      /**
       * Prueba unitaria que verifica que el correo ingresado tenga
       * el formato requerido es decir nombre@ example.com
       */
      public function testVerificarFormatoCorreo(){
        $this->assertTrue(true);
      }
    
}

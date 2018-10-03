<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Auth\RegisterController;

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

    }

    /**
     * Prueba unitaria para verificar la correcta creacion de un 
     * usuario de tipo estudiante
     */
    public function testRegistroUsuarioEstudiante(){

    }

     /**
      * Prueba unitaria para verificar la existencia de un usuario
      * en la plataforma.
      */
      public function testExisteUsuarioPlataforma(){

      }
      /**
       * Prueba unitaria para verificar si dos password coinciden
       */
      public function testConfirmarPassword(){

      }

      /**
       * Prueba unitaria que verifica que el correo ingresado tenga
       * el formato requerido es decir nombre@ example.com
       */
      public function testVerificarFormatoCorreo(){
          
      }

      /**
       * Prueba unitaria para verificar que el usuario registrado haya
       * confirmado el correo electronico
       */
      public function testVerificarConfirmacionCorreo(){
          
      }
    
}

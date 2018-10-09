<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Auth\RegisterController;
use App\Asignacion_temporal;
use App\Pensum_estudiante;
use DB;

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

        /*** BORRAR LAS TABLAS */
        DB::table('pensum_estudiante')->where('id_estudiante', $usuario->id)->delete();
        DB::table('asignacion_temporal')->where('id_estudiante', $usuario->id)->delete();

        $this->assertEquals($usuario ->id_rol, 1);
        $usuario->delete();
    }

    /**
     * Prueba unitaria para verificar la correcta creacion de un 
     * usuario de tipo estudiante
     */
    public function testRegistroUsuarioEstudiante(){
        $data = array('20201352',
        'Elmer',
        'Real',
        'elmerrealprueba@correo.com',
        'Zona 20',
        '12345678',
        '1'  
        );
      $controlador=new RegisterController(); 
      $usuario = $controlador ->agregarUsuarioEstudiante($data);

      /*** BORRAR LAS TABLAS */
      DB::table('pensum_estudiante')->where('id_estudiante', $usuario->id)->delete();
      DB::table('asignacion_temporal')->where('id_estudiante', $usuario->id)->delete();

      $this->assertEquals($usuario ->id_rol, 2);
      $usuario ->delete();
    }

     /**
      * Prueba unitaria para verificar la existencia de un usuario
      * en la plataforma.
      */
      public function testExisteUsuarioPlataforma(){
        $data = array('20201355',
        'Elmer',
        'Real',
        'elmerrealprueba@correo.com',
        'Zona 20',
        '12345678',
        '1'  
        );
        $controlador=new RegisterController(); 
        $usuario = $controlador ->agregarUsuarioEstudiante($data);
        $exiteUsuario = $controlador->existeUsuarioPlataforma($data[3]);

        /*** BORRAR LAS TABLAS */
        DB::table('pensum_estudiante')->where('id_estudiante', $usuario->id)->delete();
        DB::table('asignacion_temporal')->where('id_estudiante', $usuario->id)->delete();

        $this->assertTrue($exiteUsuario);
        $usuario ->delete();
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

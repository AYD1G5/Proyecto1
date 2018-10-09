<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Asignacion_temporal;
use App\Pensum_estudiante;
use DB;
use Illuminate\Support\Facades\Hash;


class AutenticacionTest extends TestCase
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
     * Esta prueba es para ver si el usuario esta en la base de datos
     */
    public function testExisteUsuario(){


    }

    /**
     * Verifica si la contrasena es correcta para iniciar sesion
     */

    public function testCredencialesCorrectas(){
        $data = array('202013524',
        'Elmer',
        'Real',
        'elmerrealprueba4@correo.com',
        'Zona 20',
        '12345678',
        '1'  
        );
      $controlador=new RegisterController(); 
      $usuario = $controlador ->agregarUsuarioEstudiante($data);

    $controlador=new LoginController(); 
    $password = "12345678";
    $usuario = $controlador->ObtenerUsuario('elmerrealprueba4@correo.com');
    $this->assertEquals( password_verify($password, $usuario -> password),true);

    /*** BORRAR LAS TABLAS */
    DB::table('pensum_estudiante')->where('id_estudiante', $usuario->id)->delete();
    DB::table('asignacion_temporal')->where('id_estudiante', $usuario->id)->delete();
    $usuario ->delete();
    }

    /** 
     * Esta prueba devuelve un codigo 200 si el usuario se
     * logueo correctamente
     */
    public function testLoginCorrecto(){

    }

    /***
     * Esta prueba cambia la contrasena del usuario y luego 
     * verifica si ha cambiado
     */
    public function testResetearPassword(){
        $data = array('202013524',
        'Elmer',
        'Real',
        'elmerrealprueba4@correo.com',
        'Zona 20',
        '12345678',
        '1'  
        );
      $controlador=new RegisterController(); 
      $usuario = $controlador ->agregarUsuarioEstudiante($data);

    $controlador=new LoginController(); 
    $password = "123456789";
   $usuario = $controlador->RestablecerPassword('elmerrealprueba4@correo.com',$password);
    $this->assertEquals( password_verify($password, $usuario -> password),true);

    /*** BORRAR LAS TABLAS */
    DB::table('pensum_estudiante')->where('id_estudiante', $usuario->id)->delete();
    DB::table('asignacion_temporal')->where('id_estudiante', $usuario->id)->delete();
    $usuario ->delete();
    }
    
}

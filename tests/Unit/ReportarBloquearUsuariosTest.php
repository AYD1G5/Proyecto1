<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use DB;

class ReportarBloquearUsuariosTest extends TestCase
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
        /*** CREAR UN USUARIO NUEVO **/
        $data = array('201504200',
        'Willy',
        'Slyder',
        'willyslyder@gmail.com',
        'Zona 20',
        '12345678',
        '1'  
        );
        $controlador=new RegisterController(); 
        $usuario = $controlador ->agregarUsuarioEstudiante($data);

        /** EJECUTAR EL TEST ***/
        $this->assertEquals('willyslyder@gmail.com', $usuario->email);

        /*** BORRAR LAS TABLAS ***/
        DB::table('pensum_estudiante')->where('id_estudiante', $usuario->id)->delete();
        DB::table('asignacion_temporal')->where('id_estudiante', $usuario->id)->delete();
        $usuario ->delete(); 
    }
     /**
     * Verifica si la contrasena es correcta para iniciar sesion
     */

    public function testCredencialesCorrectas(){
        $data = array('201504200',
        'Willy',
        'Slyder',
        'willyslyder@gmail.com',
        'Zona 20',
        '12345678',
        '1'  
        );
      $controlador=new RegisterController(); 
      $usuario = $controlador ->agregarUsuarioEstudiante($data);

    $controlador=new LoginController(); 
    $password = "12345678";
    $usuario = $controlador->ObtenerUsuario('willyslyder@gmail.com');
    $this->assertEquals( password_verify($password, $usuario -> password),true);

    /*** BORRAR LAS TABLAS */
    DB::table('pensum_estudiante')->where('id_estudiante', $usuario->id)->delete();
    DB::table('asignacion_temporal')->where('id_estudiante', $usuario->id)->delete();
    $usuario ->delete();
    }

    /**
     * Verifica si un usuario esta desbloqueado
     */
    public function testUsuarioDesbloqueado(){
   /*** CREAR UN USUARIO NUEVO **/
        $data = array('201504200',
        'Willy',
        'Slyder',
        'willyslyder@gmail.com',
        'Zona 20',
        '12345678',
        '1'  
        );
        $controlador=new RegisterController(); 
        $usuario = $controlador ->agregarUsuarioEstudiante($data);
        $usuario->bloqueado="0";

        /** EJECUTAR EL TEST ***/
        $this->assertEquals('0', $usuario->bloqueado);

        /*** BORRAR LAS TABLAS ***/
        DB::table('pensum_estudiante')->where('id_estudiante', $usuario->id)->delete();
        DB::table('asignacion_temporal')->where('id_estudiante', $usuario->id)->delete();
        $usuario ->delete(); 
    }

     /**
     * Verifica si un usuario esta bloquedo
     */
    public function testUsuarioBloqueado(){
        /*** CREAR UN USUARIO NUEVO **/
        $data = array('201504200',
        'Willy',
        'Slyder',
        'willyslyder@gmail.com',
        'Zona 20',
        '12345678',
        '1'  
        );
        $controlador=new RegisterController(); 
        $usuario = $controlador ->agregarUsuarioEstudiante($data);
        $usuario->bloqueado="1";

        /** EJECUTAR EL TEST ***/
        $this->assertEquals('1', $usuario->bloqueado);

        /*** BORRAR LAS TABLAS ***/
        DB::table('pensum_estudiante')->where('id_estudiante', $usuario->id)->delete();
        DB::table('asignacion_temporal')->where('id_estudiante', $usuario->id)->delete();
        $usuario ->delete(); 
    }
  
}

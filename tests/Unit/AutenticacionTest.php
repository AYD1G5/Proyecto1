<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Auth\RegisterController;
use App\Asignacion_temporal;
use App\Pensum_estudiante;
use DB;

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

        /*** CREAR UN USUARIO NUEVO **/
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

        /** EJECUTAR EL TEST ***/
        $this->assertEquals('elmerrealprueba@correo.com', $usuario->email);

        /*** BORRAR LAS TABLAS ***/
        DB::table('pensum_estudiante')->where('id_estudiante', $usuario->id)->delete();
        DB::table('asignacion_temporal')->where('id_estudiante', $usuario->id)->delete();
        $usuario ->delete();
    }

    /**
     * Esta prueba envia un mensaje al usuario con un link para 
     * ingresar una nueva contrasena
     */
    public function testRecuperarContrasena(){
        
    }
    
    /**
     * Verifica si la contrasena es correcta para iniciar sesion
     */

    public function testCredencialesCorrectas(){
        
    }

    /** 
     * Esta prueba devuelve un codigo 200 si el usuario se
     * logueo correctamente
     */
    public function testLoginCorrecto(){
        /*** CREAR USUARIO ***/
        $data = array('20201355',
        'Elmeromero',
        'Fake',
        'elmerrealprueba@correo.com',
        'Zona 20',
        '12345678',
        '1'  
        );
        $controlador=new RegisterController(); 
        $usuario = $controlador ->agregarUsuarioEstudiante($data);

        
        /*** LOGUEARSE DESDE LA PAGINA ****/
        $response = $this->call('POST', '/login', [
            'email' => 'willyslider@gmail.com',
            'password' => '12345678',
            '_token' => csrf_token()
        ]);
        $response = $this->get('/cursosporsemestre/1/semestre');
        /*** EJECUTAR EL TEST ****/
        $this->assertEquals(200, $response->getStatusCode());

        /*** BORRAR LAS TABLAS ***/
        DB::table('pensum_estudiante')->where('id_estudiante', $usuario->id)->delete();
        DB::table('asignacion_temporal')->where('id_estudiante', $usuario->id)->delete();
        $usuario ->delete();

    }

    /***
     * Esta prueba cambia la contrasena del usuario y luego 
     * verifica si ha cambiado
     */
    public function testResetearPassword(){

    }
    
}

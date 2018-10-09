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

    }

    /***
     * Esta prueba cambia la contrasena del usuario y luego 
     * verifica si ha cambiado
     */
    public function testResetearPassword(){

    }
    
}

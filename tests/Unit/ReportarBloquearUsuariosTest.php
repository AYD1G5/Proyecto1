<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Auth\RegisterController;
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

    }
     /**
     * Verifica si la contrasena es correcta para iniciar sesion
     */

    public function testCredencialesCorrectas(){

    }

    /**
     * Verifica si un usuario esta desbloqueado
     */
    public function testUsuarioDesbloqueado(){

    }

     /**
     * Verifica si un usuario esta bloquedo
     */
    public function testUsuarioBloqueado(){

    }
  
}

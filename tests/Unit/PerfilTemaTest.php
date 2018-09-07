<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use App\Http\Controllers\PerfilTemaController;

class PerfilTema extends TestCase
{
    /**
     * Prueba basica para comprobar que se ejecuta el archivo de pruebas.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    /**
     * Prueba para comprobar que al cargar la pagina esta tenga.
     * un status 200 de que esta bien.
     * @return void
     */
        public function testPerfilTemaView(){
            $response = $this->call('POST', '/login', [
            'email' => 'willyslider@gmail.com',
            'password' => '12345678',
            '_token' => csrf_token()
        ]);
        $response = $this->get('/PerfilTema/1');
            $this->assertEquals(200, $response->getStatusCode());
        }
    /**
     * Prueba para verificar que el tema 1 existe en la base de datos.
     *
     * @return void
     */
    public function testTablaTema()
    { 
        $this->assertDatabaseHas('temas', [
            'tema' => '1',
        ]);
    }
  /**
     * Prueba para saber si el creador del tema tiene id 1
     *
     * @return void
     */
    public function testTablaTemaCreador()
    { 
        $this->assertDatabaseHas('temas', [
            'creador_id' => '1',
        ]);
    }

     /**
     * Prueba para saber si el curso del tema tiene id 1
     *
     * @return void
     */
    public function testTablaTemaCurso()
    { 
        $this->assertDatabaseHas('temas', [
            'curso_id' => '1',
        ]);
    }
    
    /**
     * Prueba al controlador Perfil tema para saber si un tema existe.
     *
     * @return void
     */
    public function testPerfilTemaExiste(){
        $prefilTemaControlador = new PerfilTemaController();
        $this->assertTrue($perfilTema->ExistePerfil());
    }

    /**
     * Prueba para saber si el tema tiene comentarios existentes
     *
     * @return void
     */
    public function testComentarioExiste(){
        $prefilTemaControlador = new PerfilTemaController();
        $this->assertTrue($prefilTemaControlador->ExisteComentario());
    }

}

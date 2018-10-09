<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use App\Http\Controllers\ListarTemasController;

class ListarTemasTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function CrearTemaView(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/ListarTemas');
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
}

<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PerfilTema extends TestCase
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
    //-------- Prueba Vista Perfil Tema -------
        public function testPerfilTemaView(){
            $response = $this->call('POST', '/login', [
            'email' => 'willyslider@gmail.com',
            'password' => '12345678',
            '_token' => csrf_token()
        ]);
        $response = $this->get('/PerfilTema/1');
            $this->assertEquals(200, $response->getStatusCode());
        }
    //-------------------------------------------
    //---------- Prueba Tabla PerfilTema -------
    public function testTablaTema()
    { 
        $this->assertDatabaseHas('temas', [
            'nombre_tema' => 'Tema1'
        ]);
    }
    //-----------------------------------------

}

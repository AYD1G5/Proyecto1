<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BuscadorPersonasTest extends TestCase
{
    /**
    * ARCHIVO DE PRUEBAS UNITARIAS EXLUSIVO 
     * PARA LA VISTA DE BUSCADOR DE Personas----
     * 
     * 
     * Primer prueba unitaria en metodología TDD
     * 
     * 
     * Prueba para la vista de buscador de personas.
     * Se verifica que la respuesta de la vista 
     * sea de 200, que significa que se abrió correctamente.
     * 
     * 
     * 
     */
    public function testBuscadorCatedratico(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
        ]);
    $response = $this->get('/BuscadorPersonas');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testExistePersona()
    { 
        $this->assertDatabaseHas('users', [
            'email' => 'willyslider@gmail.com'
        ]);
    }
    public function testRolPersona()
    { 
        $this->assertDatabaseHas('rol', [
            'nombre_rol' => 'docente'
        ]);
    }
}

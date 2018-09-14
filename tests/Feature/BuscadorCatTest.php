<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BuscadorCatTest extends TestCase
{
    /**
     * ARCHIVO DE PRUEBAS UNITARIAS EXLUSIVO 
     * PARA LA VISTA DE BUSCADOR DE CATEDRATICO----
     * 
     * 
     * Primer prueba unitaria en metodología TDD
     * 
     * 
     * Prueba para la vista de buscador de catedratico.
     * Se verifica que la respuesta de la vista 
     * sea de 200, que significa que se abrió correctamente.
     * 
     * 
     * 
     */
    
      public function testBuscadorCatedratico(){
        $response = $this->call('POST', '/login', [
        'email' => 'danielgarcia0976@gmail.com',
        'password' => 'informatica10',
        '_token' => csrf_token()
        ]);
    $response = $this->get('/BuscadorCatedratico');
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Prueba unitaria utilizada para verificar la información del catedratico 
     * en la base de datos.
     */

    public function testBuscadorDatosCat()
    { 
        $this->assertDatabaseHas('users', [
            'registro_academico' => '201504asdf'
        ]);
    }


    public function testRolCat()
    { 
        $this->assertDatabaseHas('rol', [
            'id_rol' => '1'
        ]);
    }
}

<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BuscadorGrupoTest extends TestCase
{
    /**
     * ARCHIVO DE PRUEBAS UNITARIAS EXLUSIVO 
     * PARA LA VISTA DE BUSCADOR DE Grupos----
     * 
     * 
     * Primer prueba unitaria en metodología TDD
     * 
     * 
     * Prueba para la vista de buscador de Grupos.
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
    $response = $this->get('/BuscadorGrupo');
        $this->assertEquals(200, $response->getStatusCode());
    }
    public function testCiclo()
    { 
        $this->assertDatabaseHas('ciclo', [
            'nombre_ciclo' => 'primer semestre'
        ]);
    }
     public function testCurso()
    { 
        $this->assertDatabaseHas('curso', [
            'nombre_curso' => 'Matematica Basica 1'
        ]);
    }
}

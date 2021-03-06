<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BuscadorCursoTest extends TestCase
{
 /**
     * ARCHIVO DE PRUEBAS UNITARIAS EXLUSIVO 
     * PARA LA VISTA DE BUSCADOR DE CURSOS----
     * 
     * 
     * Primer prueba unitaria en metodología TDD
     * 
     * 
     * Prueba para la vista de buscador de curso.
     * Se verifica que la respuesta de la vista 
     * sea de 200, que significa que se abrió correctamente.
     * 
     * 
     * 
     */
    
    public function testBuscadorCurso(){
        $response = $this->call('POST', '/login', [
            'email' => 'willyslider@gmail.com',
            'password' => '12345678',
            '_token' => csrf_token()
        ]);
        $response = $this->get('/BuscadorCurso');
        $this->assertEquals(200, $response->getStatusCode());
    }

     /**
     * Prueba unitaria hacia la base de datos para
     * verificar la relación entre la tabla de catedratico
     * y la tabla de curso.
     */
    /**
     * @group test_bd
     */
    public function testCursosBuscador()
    { 
        $this->assertDatabaseHas('curso', [
            'id_curso' => '1'
        ]);
    }

}

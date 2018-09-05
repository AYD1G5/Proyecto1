<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PerfilCatedraticoTest extends TestCase
{
    

    /**
     * ARCHIVO DE PRUEBAS UNITARIAS EXLUSIVO 
     * PARA LA VISTA DE PERFIL CATEDRATICO----
     * 
     * 
     * Primer prueba unitaria en metodología TDD
     * 
     * 
     * Prueba para la vista de perfil de catedratico.
     * Se verifica que la respuesta de la vista 
     * sea de 200, que significa que se abrió correctamente.
     * 
     * 
     * 
     */

     /**
      * @group test_vista
      */

    public function testVistaCatedratico(){
        $response = $this->call('POST', '/login', [
        'email' => 'danielgarcia0976@gmail.com',
        'password' => 'informatica10',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/PerfilCatedratico');
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Prueba unitaria utilizada para verificar la información del catedratico 
     * en la base de datos.
     */

    /**
     * @group test_bd
     */

    public function testCatedratico()
    { 
        $this->assertDatabaseHas('users', [
            'registro_academico' => '201504480'
        ]);
    }

    /**
     * @group test_bd
     */
    
    public function testRolCatedratico()
    { 
        $this->assertDatabaseHas('rol', [
            'id_rol' => '1'
        ]);
    }



}

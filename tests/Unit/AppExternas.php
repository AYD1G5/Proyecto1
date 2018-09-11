<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppExternas extends TestCase
{
    /**
     * Prueba creada para probar si esta retornando correctamente la vista \AppExterna
     */
    public function testPerfilGrupo(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/AppExterna');
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Prueba creada para probar la respueta de la base de datos de la tabla: Grupo
     * y la columna: Nombre
     */
    public function testAppExternaDB()
    { 
        $this->assertDatabaseHas('AppExterna', [
            'nombre' => 'Facebook'
        ]);
    }

    
}

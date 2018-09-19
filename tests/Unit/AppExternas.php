<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\AppExternaController;


class AppExternas extends TestCase
{
    /**
     * Prueba creada para probar si esta retornando correctamente la vista \AppExterna
     */
    public function testAppExterna(){
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

    /**
     * Prueba creada para probar si existe alguna applicacion externa
     * registrada en la base de Datos para saber si hay alguan aplicación aprobada
     * para que el usuario la utilice
     */
    public function testAppExiste()
    {
        $appExternaController=new AppExternaController(); 
        $this->assertTrue($appExternaController->ExisteApp());
    }

    
}

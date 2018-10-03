<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PerfilCursoTest extends TestCase
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
    //Prueba a la base de datos para ver si existe en curso matematica
    public function testCurso()
    { 
        $this->assertDatabaseHas('curso', [
            'nombre_curso' => 'Matematica Basica 1'
        ]);
    }
    //Prueba para verificar que exita algun curso con una nota de 61
    public function testCursoAsignacion()
    { 
        $this->assertDatabaseHas('curso_asignacion', [
            'nota' => '65'
        ]);
    }
    
   
   
    public function testAsignaciontemporalCreate(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/asignaciontemporal/1/1/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

   

    
}

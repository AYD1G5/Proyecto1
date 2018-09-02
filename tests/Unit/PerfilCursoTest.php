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
    public function testCurso()
    { 
        $this->assertDatabaseHas('curso', [
            'nombre_curso' => 'Matematica Basica 1'
        ]);
    }

    public function testCursoAsignacion()
    { 
        $this->assertDatabaseHas('curso_asignacion', [
            'nota' => '67'
        ]);
    }
    
    public function testAsignaciontemporalMostrar(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('asignaciontemporal/1/mostrar');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testAsignaciontemporal(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/asignaciontemporal');
        $this->assertEquals(200, $response->getStatusCode());
    }
}

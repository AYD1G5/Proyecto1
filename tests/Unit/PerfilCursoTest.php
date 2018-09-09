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
            'nota' => '61'
        ]);
    }
    
    //prueba para verificar que funcione la vista perfil curso
    public function testAsignaciontemporalMostrar(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('asignaciontemporal/1/mostrar');
        $this->assertEquals(200, $response->getStatusCode());
    }

    //Prueba para verficar que funcion la vista de perfil
    public function testAsignaciontemporal(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/asignaciontemporal');
        $this->assertEquals(200, $response->getStatusCode());
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

    public function testPreYPost(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/asignaciontemporal/2/mostrar');
        $this->assertEquals(200, $response->getStatusCode());
    }

    
}

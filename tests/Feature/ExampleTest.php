<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{


    public function testUsuariosCursosCarrera(){
      $response = $this->get('/pruebaUsuariosCursoCarrera/1/1/1');
      $response->assertStatus(200)->assertSee('Usuario: 1 Curso: 1 Carrera: 1');
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

    public function testAsignaciontemporalCreate(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/asignaciontemporal/1/1/create');
        $this->assertEquals(200, $response->getStatusCode());
    }
    

    public function testRevisarAsignacion(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('revisarasignacion/1');
        $this->assertEquals(200, $response->getStatusCode());
    }
    


    public function testFinalizarAsignacion(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('finalizarasignacion/');
        $this->assertEquals(200, $response->getStatusCode());
    }


    public function testCursosPorSemestre(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/cursosporsemestre');
        $this->assertEquals(200, $response->getStatusCode());
    }
    

    public function testCursosPorSemestreID(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/cursosporsemestre/1/semestre');
        $this->assertEquals(200, $response->getStatusCode());
    }
    

    public function testReportCursosGanados(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/ReporteCursosGanados');
        $this->assertEquals(200, $response->getStatusCode());
    }
    

    public function testReporteCursosObligaPendientes(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/ReporteCursosObligaPendientes');
        $this->assertEquals(200, $response->getStatusCode());
    }
        
}

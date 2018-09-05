<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    //Pruebas a la Base de Datos
    public function testExisteUser()
    { 
        $this->assertDatabaseHas('users', [
            'email' => 'willyslider@gmail.com'
        ]);
    }

    public function testArea()
    { 
        $this->assertDatabaseHas('area', [
            'nombre_area' => 'Matematica'
        ]);
    }

    public function testExisteAsignacion()
    { 
        $this->assertDatabaseHas('asignacion', [
            'id_asignacion' => '1'
        ]);
    }

    public function testCarrera()
    { 
        $this->assertDatabaseHas('carrera', [
            'nombre_carrera' => 'Civil'
        ]);
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

    public function testCursoAsignacion()
    { 
        $this->assertDatabaseHas('curso_asignacion', [
            'nota' => '61'
        ]);
    }

    public function testCurso_catedratico()
    { 
        $this->assertDatabaseHas('curso_catedratico', [
            'id_curso_catedratico' => '1'
        ]);
    }

    public function testEscuela()
    { 
        $this->assertDatabaseHas('escuela', [
            'nombre_escuela' => 'Ciencias'
        ]);
    }

    public function testPensum()
    { 
        $this->assertDatabaseHas('pensum', [
            'codigo_pensum' => '1'
        ]);
    }
    public function testRol()
    { 
        $this->assertDatabaseHas('rol', [
            'nombre_rol' => 'docente'
        ]);
    }


}

<?php

namespace Tests\Feature;

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
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testUsuariosCursosCarrera(){
      $response = $this->get('/pruebaUsuariosCursoCarrera/1/1/1');
      $response->assertStatus(200)->assertSee('Usuario: 1 Curso: 1 Carrera: 1');
    }
}

<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PerfilGrupoTest extends TestCase
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

    public function testPerfilGrupo(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/PerfilGrupo');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testTemaDB()
    { 
        $this->assertDatabaseHas('tema', [
            'id_curso' => '1'
        ]);
    }

    public function testComentarioTemaDB()
    { 
        $this->assertDatabaseHas('Comentario', [
            'id_tema' => '1'
        ]);
    }


}

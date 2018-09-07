<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\PerfilGrupoController;

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

    public function testTemaGrupo(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/TemaGrupo');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testComentarioGrupo(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/ComentarioGrupo');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGrupoDB()
    { 
        $this->assertDatabaseHas('grupo', [
            'nombre' => 'Grupo1'
        ]);
    }

    public function testEstudianteGrupoDB()
    { 
        $this->assertDatabaseHas('grupo', [
            'id_Creador_Grupo' => '3'
        ]);
    }
    public function testTemaGrupoDB()
    { 
        $this->assertDatabaseHas('Tema_Grupo', [
            'id_Tema_Grupo' => '1'
        ]);
    }

    public function testComentarioTemaDB()
    { 
        $this->assertDatabaseHas('Comentario_Grupo', [
            'id_Tema_Grupo' => '1'
        ]);
    }

    
    public function testTemaExiste()
    {
        $controladorGrupo=new PerfilGrupoController(); 
        $this->assertTrue($controladorGrupo->ExisteTema(1));
    }

    public function testComentarioExiste()
    {
        $controladorGrupo=new PerfilGrupoController(); 
        $this->assertTrue($controladorGrupo->ExisteComentario(1));
    }


}

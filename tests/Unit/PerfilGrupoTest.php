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
    /**
     * Prueba creada para probar si esta retornando correctamente la vista \PerfilGrupo
     */
    public function testPerfilGrupo(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/PerfilGrupo');
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Prueba creada para probar si esta retornando correctamente la vista \TemaGrupo
     */
    public function testTemaGrupo(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/TemaGrupo');
        $this->assertEquals(200, $response->getStatusCode());
    }
    /**
     * Prueba creada para probar si esta retornando correctamente la vista \ComentarioGrupo
     */
    public function testComentarioGrupo(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/ComentarioGrupo');
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Prueba creada para probar la respueta de la base de datos de la tabla: Grupo
     * y la columna: Nombre
     */
    public function testGrupoDB()
    { 
        $this->assertDatabaseHas('grupo', [
            'nombre' => 'Grupo1'
        ]);
    }

    /**
     * Prueba creada para probar la respueta de la base de datos de la tabla: Grupo
     * y la columna: id_Creador_Grupo
     */
    public function testEstudianteGrupoDB()
    { 
        $this->assertDatabaseHas('grupo', [
            'id_Creador_Grupo' => '3'
        ]);
    }

    /**
     * Prueba creada para probar la respueta de la base de datos de la tabla: Tema_Grupo
     * y la columna: id_Tema_Grupo
     */
    public function testTemaGrupoDB()
    { 
        $this->assertDatabaseHas('Tema_Grupo', [
            'id_Tema_Grupo' => '1'
        ]);
    }

    /**
     * Prueba creada para probar la respueta de la base de datos de la tabla: Tema_Grupo
     * y la columna: id_Tema_Grupo
     */
    public function testComentarioTemaDB()
    { 
        $this->assertDatabaseHas('Comentario_Grupo', [
            'id_Tema_Grupo' => '1'
        ]);
    }


    /**
     * TDD Prueba creada antes de diseñar el Metodo: ExisteTema 
     * en el controlador: PerfilGrupoController
     */
    public function testTemaExiste()
    {
        $controladorGrupo=new PerfilGrupoController(); 
        $this->assertTrue($controladorGrupo->ExisteTema(1));
    }


    /**
     * TDD Prueba creada antes de diseñar el Metodo: ExisteComentario
     * en el controlador: PerfilGrupoController
     */
    public function testComentarioExiste()
    {
        $controladorGrupo=new PerfilGrupoController(); 
        $this->assertTrue($controladorGrupo->ExisteComentario(1));
    }


}

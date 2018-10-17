<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CatalogoCursoTest extends TestCase
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

    /*
    *   Esta prueba servira para agregar cursos al catalogo
    */
    public function testADDCatalogoCurso(){
        $user=new User();
        $user->registro_academico='55555-4';
        $user->nombre='Name';
        $user->apellido='LastName';
        $user->id_rol='1';
        $user->direccion='Guatemala';
        $user->email='Name4@gmail.com';
        $user->password=Hash::make('12345678');
        $user->telefono='777777';
        $user->save();

        $user1=new User();
        $user1->registro_academico='88888';
        $user1->nombre='Name';
        $user1->apellido='LastName';
        $user1->id_rol='1';
        $user1->direccion='Guatemala';
        $user1->email='Name5@gmail.com';
        $user1->password=Hash::make('12345678');
        $user1->telefono='12345678';
        $user1->save();

        $response = $this->call('POST', '/login', [
        'email' => $user->email,
        'password' => '12345678',
        '_token' => csrf_token()
    ]);

    //$response = $this->get('/CrearUsuario');
    $response = $this->get('/CrearGrupo');
    //se eliminan los usuarios para no afectar a los datos dentro de la BD
    $user->delete();
    $user1->delete();
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testBuscadorCatalogo(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
        ]);
        //$response = $this->get('/BuscadorCatalogo');
    $response = $this->get('/BuscadorGrupo');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testCatalogoCursosoPorCiclo()
    { 
        $this->assertDatabaseHas('ciclo', [
            'nombre_ciclo' => 'primer semestre'
        ]);
    }

    public function testCatalogosCursosExistentes()
    { 
        $this->assertDatabaseHas('curso', [
            'nombre_curso' => 'Matematica Basica 1'
        ]);
    }

    public function CrearTemaView(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/CrearTemas');
    }
       
}

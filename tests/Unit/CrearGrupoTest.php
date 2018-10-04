<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Grupo;
use Auth;
use Illuminate\Support\Facades\Hash;

class CrearGrupoTest extends TestCase
{
        /**
     * Prueba creada para probar si esta retornando correctamente la vista \CrearGrupo
     */
    public function testCrearGrupo(){
        $user=new User();
        $user->registro_academico='55555';
        $user->nombre='Name';
        $user->apellido='LastName';
        $user->id_rol='1';
        $user->direccion='Guatemala';
        $user->email='Name@gmail.com';
        $user->password=Hash::make('12345678');
        $user->telefono='777777';
        $user->save();
        
        $response = $this->call('POST', '/login', [
        'email' => $user->email,
        'password' => '12345678',
        '_token' => csrf_token()
    ]);

    $response = $this->get('/CrearGrupo');
    $user->delete();
        $this->assertEquals(200, $response->getStatusCode());
    }


     /**
     * Prueba creada para probar si esta retornando correctamente la vista \CrearGrupo
     */
    public function testVerTextoCrearGrupo(){
        $user=new User();
        $user->registro_academico='55555';
        $user->nombre='Name';
        $user->apellido='LastName';
        $user->id_rol='1';
        $user->direccion='Guatemala';
        $user->email='Name@gmail.com';
        $user->password=Hash::make('12345678');
        $user->telefono='777777';
        $user->save();
        
        $response = $this->call('POST', '/login', [
        'email' => $user->email,
        'password' => '12345678',
        '_token' => csrf_token()
    ]);

    $response = $this->get('/CrearGrupo');
    $user->delete();
    $response->assertSeeText('Nuevo Grupo');
    }

    /**
     * Prueba creada para probar la respueta de la base de datos de la tabla: Grupo
     * y la columna: Nombre
     */
    public function testCrearGrupoDB()
    { 
        $user=new User();
        $user->registro_academico='55555';
        $user->nombre='Name';
        $user->apellido='LastName';
        $user->id_rol='1';
        $user->direccion='Guatemala';
        $user->email='Name@gmail.com';
        $user->password=Hash::make('12345678');
        $user->telefono='777777';
        $user->save();



        $Grupo=new Grupo();
        $Grupo->id_Creador_Grupo=$user->id; 
        $Grupo->nombre='GrupoTest';
        
        $this->assertDatabaseHas('grupo', [
            'nombre' => 'GrupoTest'
        ]);

        $Grupo->delete();
        $user->delete();
    }



}

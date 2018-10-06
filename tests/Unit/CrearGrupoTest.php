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
        $user->registro_academico='55555-1';
        $user->nombre='Name';
        $user->apellido='LastName';
        $user->id_rol='1';
        $user->direccion='Guatemala';
        $user->email='Name1@gmail.com';
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
        $user->registro_academico='55555-2';
        $user->nombre='Name';
        $user->apellido='LastName';
        $user->id_rol='1';
        $user->direccion='Guatemala';
        $user->email='Name2@gmail.com';
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
        $user->registro_academico='55555-3';
        $user->nombre='Name';
        $user->apellido='LastName';
        $user->id_rol='1';
        $user->direccion='Guatemala';
        $user->email='Name3@gmail.com';
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

    /*
    *   Esta prueba servira para agregar usuarios dentro de un grupo
    */
    public function testUsuarioGrupo(){
        $user=new User();
        $user->registro_academico='55555';
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

        $user2=new User();
        $user2->registro_academico='99999';
        $user2->nombre='Name';
        $user2->apellido='LastName';
        $user2->id_rol='1';
        $user2->direccion='Guatemala';
        $user2->email='Name6@gmail.com';
        $user2->password=Hash::make('12345678');
        $user2->telefono='12345678';
        $user2->save();

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
    $user2->delete();
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
    * Prueba para verificar la existencia o no de un usuario dentro de un grupo
    */
   public function testVerificarExistenciaGrupo(){
     //se crea el usuario para luego verificar que exista
       $user=new User();
       $user->registro_academico='55555';
       $user->nombre='Name';
       $user->apellido='LastName';
       $user->id_rol='1';
       $user->direccion='Guatemala';
       $user->email='Name7@gmail.com';
       $user->password=Hash::make('12345678');
       $user->telefono='777777';
       $user->save();

       $response = $this->call('POST', '/login', [
       'email' => $user->email,
       'password' => '12345678',
       '_token' => csrf_token()
   ]);
   //$response = $this->get('/ExisteUsuario');
   $response = $this->get('/CrearGrupo');
   $user->delete();
   $response->assertSeeText('Usuario Existente');
   }


   /**
    *
    *   prueba para agregar usuario a un Grupo
    */
   public function testAgregarUsuarioAGrupo()
   {
     // se crea un usario temporal para comprobar que este ligado en la BD
       $user=new User();
       $user->registro_academico='55555';
       $user->nombre='Name';
       $user->apellido='LastName';
       $user->id_rol='1';
       $user->direccion='Guatemala';
       $user->email='Name8@gmail.com';
       $user->password=Hash::make('12345678');
       $user->telefono='777777';
       $user->save();



       $Grupo=new Grupo();
       $Grupo->id_Creador_Grupo=$user->id;
       $Grupo->nombre='GrupoTest';

       $this->assertDatabaseHas('grupo', [
           'nombre' => 'GrupoTest'
       ]);
       //se elimina el grupo y el usuario temporales
       $Grupo->delete();
       $user->delete();
   }



}

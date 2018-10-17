<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;


class CatalogoCarreraTest extends TestCase
{
    
    
     /**
     * Prueba creada para probar si esta retornando correctamente la vista \CatalogoCarrera
     */
    public function testCatalogoCarrera(){
        $user=new User();
        $user->registro_academico='555557-1';
        $user->nombre='Name';
        $user->apellido='LastName';
        $user->id_rol='1';
        $user->direccion='Guatemala';
        $user->email='Name71@gmail.com';
        $user->password=Hash::make('12345678');
        $user->telefono='777777';
        $user->save();

        $response = $this->call('POST', '/login', [
        'email' => $user->email,
        'password' => '12345678',
        '_token' => csrf_token()
    ]);

    $response = $this->get('/CatalogoCarrera');
    $user->delete();
        $this->assertEquals(200, $response->getStatusCode());
    }

}

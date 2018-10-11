<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\FormNuevoPensum;
use Auth;
use Illuminate\Support\Facades\Hash;

class FormNuevoPensumTest extends TestCase
{
    /**
     * Prueba creada para probar la respueta de la base de datos de la tabla: Form_Nuevo_Pensum
     * y la columna: Nombre
     */
    public function testFormNuevoPensumDB()
    {
        $form=new FormNuevoPensum();
        $form->codigo_pensum='55555';
        $form->nombre_pensum='Name';
        $form->id_carrera='25';
        $form->save();

        $this->assertDatabaseHas('form_nuevo_pensum', [
            'nombre_pensum' => 'Name'
        ]);

        $form->delete();
    }

     /**
     * Prueba creada para probar si esta retornando correctamente la vista \FormNuevoPensum
     */
    public function testVerTextoFormNuevoPensum(){
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

    $response = $this->get('/FormNuevoPensum');
    $user->delete();
    $response->assertSeeText('Formulario de Solicitud de Nuevo Pensum');
    }



}

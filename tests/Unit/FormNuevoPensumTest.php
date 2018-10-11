<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\FormNuevoPensum;
use Auth;

class FormNuevoPensumTest extends TestCase
{
    /**
     * Prueba creada para probar la respueta de la base de datos de la tabla: Grupo
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




}

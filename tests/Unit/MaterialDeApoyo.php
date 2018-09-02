<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MaterialDeApoyo extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
     //Pruebas a la Base de Datos
    public function testExisteTablaMaterial()
    { 
        $this->assertDatabaseHas('material', [
            'email' => 'willyslider@gmail.com'
        ]);
    }
    
    public function testExisteTablaMaterialCurso()
    { 
        $this->assertDatabaseHas('material_curso', [
            'email' => 'willyslider@gmail.com'
        ]);
    }

    public function testExisteRegistroMaterialCurso()
    { 
        $this->assertDatabaseHas('material_curso', [
            'id_material' => '1'
        ]);
    }


    public function testExisteRegistroMaterial()
    { 
        $this->assertDatabaseHas('material', [
            'id_material' => '1'
        ]);
    }

    public function testDescargarMaterial(){
        $response = $this->get('/curso/material/descargarmaterialdeapoyo/1/');
        $response->assertStatus(500);
    }

    public function testListarMaterial(){
        $response = $this->get('/curso/material/listarmaterialdeapoyo/1/');
        $response->assertStatus(500);
    }


}

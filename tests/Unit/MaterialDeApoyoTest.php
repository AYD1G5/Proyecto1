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
            'id_material' => '1'
        ]);
    }
    
    public function testExisteTablaMaterialCurso()
    { 
        $this->assertDatabaseHas('material_curso', [
            'id_material_curso' => '1'
        ]);
    }


    public function testDescargarMaterial(){
        $response = $this->get('/curso/material/descargarmaterialdeapoyo/1/');
        $response->assertStatus(302);
    }

    public function subirMaterial(){
        $response = $this->get('/curso/material/subirmaterialdeapoyo/1/');
        $response->assertStatus(302);
    }


    public function testListarMaterial(){
        $response = $this->get('/curso/material/listarmaterialdeapoyo/1/');
        $response->assertStatus(302);
    }


}

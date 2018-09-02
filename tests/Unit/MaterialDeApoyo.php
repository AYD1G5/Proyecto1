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
    public function testExistePaginaMaterial()
    { 
        $this->assertDatabaseHas('material', [
            'email' => 'willyslider@gmail.com'
        ]);
    }

}

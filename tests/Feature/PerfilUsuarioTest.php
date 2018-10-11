<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PerfilUsuarioTest extends TestCase
{
   
        
    
        /**
         * ARCHIVO DE PRUEBAS UNITARIAS EXLUSIVO 
         * PARA LA VISTA DE PERFIL USUARIO----
         * 
         * 
         * Primer prueba unitaria en metodología TDD
         * 
         * 
         * Prueba para la vista de perfil de catedratico.
         * Se verifica que la respuesta de la vista 
         * sea de 200, que significa que se abrió correctamente.
         * 
         * 
         * 
         */
    
        public function testCatedratico()
        { 
            $this->assertDatabaseHas('users', [
                'registro_academico' => '201503666'
            ]);
        }
        /**
         * Prueba unitaria utilizada para verificar que existan ambos
         * roles para los usuarios.
         */

        /**
         * @group test_bd
         */
        
        public function testRolUsuario()
        { 
            $this->assertDatabaseHas('rol', [
                'id_rol' => '2'
            ]);
        }

        public function testRolCatedratico()
        { 
            $this->assertDatabaseHas('rol', [
                'id_rol' => '1'
            ]);
        }
    

        /**
         * @group test_bd
         */
        public function testIdUsuario()
        { 
            $this->assertDatabaseHas('users', [
                'id' => '1'
            ]);
        }
    

    
    
    
    
}

<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReporteDesempeñoCatedraticosTest extends TestCase
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

    public function testEncuestaCatedraticos(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/ReporteEncuestaCatedraticos');
        $this->assertEquals(200, $response->getStatusCode());
    }


    public function testBD(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);

      $response = $this->visit('/encuesta/1/1')
                       ->type('5', 'puntual')
                       ->type('5', 'preparacion')
                       ->type('4', 'manejo')
                       ->type('4', 'entendible')
                       ->type('3', 'accesible')
                       ->type('1', 'responsable')
                       ->press('button')
                       ->seePageIs('/cursosporsemestre/1/semestre')
                       ->click('PrimerSemestre')
                       ->see('Se ha evaluado a un catedratico de manera exitosa');
    }
}

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


    public function testVista1(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);//esto es la autenticacion
    $response = $this->get('/ReporteEncuestaCatedraticos/1'); // falta añadirlo a las rutas
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testVista2(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);//esto es la autenticacion
    $response = $this->get('/ReporteEncuestaCatedraticos/1/2'); // falta añadirlo a las rutas
        $this->assertEquals(200, $response->getStatusCode());
    }



    public function testVista1(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);

      $response = $this->visit('/encuesta/2/2')
                       ->type('5', 'puntual')
                       ->type('5', 'preparacion')
                       ->type('4', 'manejo')
                       ->type('4', 'entendible')
                       ->type('3', 'accesible')
                       ->type('1', 'responsable')
                       ->press('button')
                       ->seePageIs('/cursosporsemestre/2/semestre')
                       ->click('SegundoSemestre')
                       ->see('Se ha evaluado a un catedratico de manera exitosa');
    }



    public function testVista2(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);

      $response = $this->visit('/encuesta/3/3')
                       ->type('5', 'puntual')
                       ->type('5', 'preparacion')
                       ->type('4', 'manejo')
                       ->type('4', 'entendible')
                       ->type('3', 'accesible')
                       ->type('1', 'responsable')
                       ->press('button')
                       ->seePageIs('/cursosporsemestre/3/semestre')
                       ->click('TercerSemestre')
                       ->see('Se ha evaluado a un catedratico de manera exitosa');
    }

    public function testConsulta1(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/testConsulta1');
        $this->assertEquals(200, $response->getStatusCode());
    }
    public function testConsulta2(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/testConsulta2');
        $this->assertEquals(200, $response->getStatusCode());
    }
    public function testConsulta3(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/testConsulta3');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testConsulta4(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/TestReporteEncuesta1/{id}');
        $this->assertEquals(200, $response->getStatusCode());
    }

        public function testConsulta5(){
            $response = $this->call('POST', '/login', [
            'email' => 'willyslider@gmail.com',
            'password' => '12345678',
            '_token' => csrf_token()
        ]);
        $response = $this->get('/TestReporteEncuesta2/{id}/{semestre}');
            $this->assertEquals(200, $response->getStatusCode());
        }


        public function testConsulta5(){
            $response = $this->call('POST', '/login', [
            'email' => 'willyslider@gmail.com',
            'password' => '12345678',
            '_token' => csrf_token()
        ]);
        $response = $this->get('/TestReporteEncuesta3/{id}/{semestre}/{catedratico}');
            $this->assertEquals(200, $response->getStatusCode());
        }


        public function testConsulta5(){
                $response = $this->call('POST', '/login', [
                'email' => 'willyslider@gmail.com',
                'password' => '12345678',
                '_token' => csrf_token()
            ]);
            $response = $this->get('/TestReporteEncuesta3/{id}/{semestre}/{catedratico}/{anio}');
                $this->assertEquals(200, $response->getStatusCode());
        }

        public function testConsulta6(){
                $response = $this->call('POST', '/login', [
                'email' => 'willyslider@gmail.com',
                'password' => '12345678',
                '_token' => csrf_token()
            ]);
            $response = $this->get('/TestReporteEncuesta3/{id}/{semestre}/{catedratico}/{anio}/{curso}');
                $this->assertEquals(200, $response->getStatusCode());
        }

}

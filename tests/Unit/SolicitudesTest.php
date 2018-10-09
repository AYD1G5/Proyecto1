<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Auth\RegisterController;
use App\Asignacion_temporal;
use App\Pensum_estudiante;
use App\Solicitud;
use DB;

class SolicitudesTest extends TestCase
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
    /*
     * Prueba unitaria para verificar la correcta creacion de un 
     * usuario de tipo catedratico
    */
    public function testExisteSolicitud(){
      /*** CREAR REGISTRO */
      $nueva = Solicitudes::create([
        'solicitud_id' => 1,
        'no_estado' => 0,
        'user_id' => 3,
        'amigo_id' => 4,
      ]);
      $solicit = Solicitudes::where('solicitud_id', 1)->first();

      /** EJECUTAR LA PRUEBA */
      $this->assertEquals($nueva->solicitud_id, $solicit->solicitud_id);
      $nueva->delete();
    }

    public function testSolicitudPendiente(){
      /*** CREAR REGISTRO */
      $nueva = Solicitudes::create([
        'solicitud_id' => 1,
        'no_estado' => 0,
        'user_id' => 3,
        'amigo_id' => 4,
      ]);
      $solicit = Solicitudes::where('solicitud_id', 1)->first();

      /** EJECUTAR LA PRUEBA */
      $this->assertEquals($solicit->no_estado, 0);
      $nueva->delete();
    }
    
    public function testSolicitudAceptada(){
      /*** CREAR REGISTRO */
      $nueva = Solicitudes::create([
        'solicitud_id' => 1,
        'no_estado' => 1,
        'user_id' => 3,
        'amigo_id' => 4,
      ]);
      $solicit = Solicitudes::where('solicitud_id', 1)->first();

      /** EJECUTAR LA PRUEBA */
      $this->assertEquals($solicit->no_estado, 1);
      $nueva->delete();
    }

    public function testSolicitudRechazada(){
      /*** CREAR REGISTRO */
      $nueva = Solicitudes::create([
        'solicitud_id' => 1,
        'no_estado' => 2,
        'user_id' => 3,
        'amigo_id' => 4,
      ]);
      $solicit = Solicitudes::where('solicitud_id', 1)->first();

      /** EJECUTAR LA PRUEBA */
      $this->assertEquals($solicit->no_estado, 2);
      $nueva->delete();
    }
}

<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SolicitudesController;
use App\Asignacion_temporal;
use App\Pensum_estudiante;
use App\Solicitud;
use DB;

class ReporteRepitenciaTest extends TestCase
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
      $user_id = 3;
      $controlador = new SolicitudesController();
      $nuevasolic = $controlador->crearSolicitud(0, $user_id, 4);

      $consultarsolicitud = Solicitud::where('solicitud_id', $nuevasolic->solicitud_id)->first();

      /** EJECUTAR LA PRUEBA */
      $this->assertEquals($nuevasolic->solicitud_id, $consultarsolicitud->solicitud_id);
      $nuevasolic->delete();
    }

    public function testSolicitudPendiente(){
      /*** CREAR REGISTRO */
      $no_estado  = 0;
      $controlador = new SolicitudesController();
      $nuevasolic = $controlador->crearSolicitud($no_estado, 3, 4);

      /** EJECUTAR LA PRUEBA */
      if($nuevasolic){
        $this->assertEquals($nuevasolic->no_estado, $no_estado);
      }else{
        $this->assertEquals(false);  
      }
      $nuevasolic->delete();
    }
    
    public function testSolicitudAceptada(){
      /*** CREAR REGISTRO */
      $no_estado  = 1;
      $controlador = new SolicitudesController();
      $nuevasolic = $controlador->crearSolicitud($no_estado, 3, 4);

      /** EJECUTAR LA PRUEBA */
      if($nuevasolic){
        $this->assertEquals($nuevasolic->no_estado, $no_estado);
      }else{
        $this->assertEquals(false);  
      }
      $nuevasolic->delete();
    }

    public function testSolicitudRechazada(){
      /*** CREAR REGISTRO */
      $no_estado  = 2;
      $controlador = new SolicitudesController();
      $nuevasolic = $controlador->crearSolicitud($no_estado, 3, 4);

      /** EJECUTAR LA PRUEBA */
      if($nuevasolic){
        $this->assertEquals($nuevasolic->no_estado, $no_estado);
      }else{
        $this->assertEquals(false);  
      }
      $nuevasolic->delete();
    }

//    public function testCambiarEstadoSolicitud(){
//      /*** CREAR REGISTRO */
//      $no_estado  = 0;
//      $controlador = new SolicitudesController();
//      $nuevasolic = $controlador->crearSolicitud($no_estado, 3, 4);
//      if(!$nuevasolic){
//        $this->assertEquals(false);  
//      }
//      
//      $estadoAnterior = $nuevasolic->no_estado;
//      /** CAMBIAR ESTADO */
//      $nuevasolic->no_estado = 2;
//      $nuevasolic->save();
//      $estadoActual = $nuevasolic->no_estado;
//      /** EJECUTAR LA PRUEBA */
//     $this->assertEquals($estadoActual, 2);
//      $nuevasolic->delete();
//    }


    //se realizaron cambio sobre el anterior metodo y se veran reflejados en este
    public function testCambiarEstadoSolicitud(){
      /*** CREAR REGISTRO */
      $no_estado  = 0;
      $controlador = new SolicitudesController();
      $nuevasolic = $controlador->crearSolicitud($no_estado, 1, 4);
      $no_estado  = 0;
      $controlador = new SolicitudesController();
      $nuevasolic1 = $controlador->crearSolicitud($no_estado, 2, 4);
      $no_estado  = 0;
      $controlador = new SolicitudesController();
      $nuevasolic2 = $controlador->crearSolicitud($no_estado, 3, 4);
      $no_estado  = 0;
      $controlador = new SolicitudesController();
      $nuevasolic3 = $controlador->crearSolicitud($no_estado, 4, 4);
      if(!$nuevasolic){
        $this->assertEquals(false);  
      }
      
      $estadoAnterior = $nuevasolic->no_estado;
      $estadoAnterior1 = $nuevasolic1->no_estado;
      $estadoAnterior2 = $nuevasolic2->no_estado;
      $estadoAnterior3 = $nuevasolic3->no_estado;
      /** CAMBIAR ESTADO */
      $nuevasolic->no_estado = 2;
      $nuevasolic->save();
      $estadoActual = $nuevasolic->no_estado;
      /** CAMBIAR ESTADO */
      $nuevasolic1->no_estado = 2;
      $nuevasolic1->save();
      $estadoActual1 = $nuevasolic1->no_estado;
      /** CAMBIAR ESTADO */
      $nuevasolic2->no_estado = 2;
      $nuevasolic2->save();
      $estadoActual2 = $nuevasolic2->no_estado;
      /** CAMBIAR ESTADO */
      $nuevasolic3->no_estado = 2;
      $nuevasolic3->save();
      $estadoActual3 = $nuevasolic3->no_estado;
      /** EJECUTAR LA PRUEBA */
      $this->assertEquals($estadoActual, 2);
      $this->assertEquals($estadoActual1, 2);
      $this->assertEquals($estadoActual2, 2);
      $this->assertEquals($estadoActual3, 2);
      $nuevasolic->delete();
      $nuevasolic1->delete();
      $nuevasolic2->delete();
      $nuevasolic3->delete();
    }
}

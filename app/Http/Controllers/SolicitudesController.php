<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tema;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Curso;
use App\ComentarioTema;
use App\ObjetoSolicitud;
use App\ObjetoComentario;
use Illuminate\Support\Collection;
use App\Solicitud;
use DB;
use Auth;
class SolicitudesController extends Controller
{
    
    public function listarSolicitudes(){
        $solicitudes=DB::table('solicitudes as sol')
        ->where('sol.user_id', '=', Auth::id())
        ->get();
      
        $coleccion = new Collection();
     
        foreach($solicitudes as $solut){
            $obj = new ObjetoSolicitud();
            $obj->solicitud = $solut;
            $amigo=DB::table('users as us')
            ->where('us.id', '=', $solut->amigo_id)
            ->first();
            $obj->amigo = $amigo;
            $coleccion->push($obj);
         }
         return view('Solicitudes.listaSolicitudes', ["solicitudes"=>$coleccion]);
    }
    
    public function cambiarEstadoSolicitud($solicitudid, $noestado){
        $solicitud=Solicitud::where('solicitud_id', $solicitudid)->first();
        $solicitud->no_estado = $noestado;
        $solicitud->save();
        return Redirect::to('solicitudes/listar');
    }

    public function crearSolicitudPagina($amigoid){
        $this->crearSolicitud(0, Auth::id(), $amigoid);
        return Redirect::to('solicitudes/listar');
    }

    public function crearSolicitud($no_estado, $user_id, $amigo_id){
        $nueva = Solicitud::create([
            'no_estado' => $no_estado,
            'user_id' => $user_id,
            'amigo_id' => $amigo_id,
        ]);
        return $nueva;
    }
}

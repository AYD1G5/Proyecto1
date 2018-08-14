<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    protected $table = 'asignacion';

    protected $primaryKey='id_asignacion';
    
    protected $fillable = [
        'id_estudiante', 
        'id_ciclo',
        'anio',
    ];

    protected $guarded = [

    ];
}

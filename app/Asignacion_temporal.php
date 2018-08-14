<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion_temporal extends Model
{
    protected $table = 'asignacion_temporal';

    protected $primaryKey='id_asignacion_temporal';
    
    protected $fillable = [
        'id_estudiante',
        'id_pensum',
    ];

    protected $guarded = [

    ];
}

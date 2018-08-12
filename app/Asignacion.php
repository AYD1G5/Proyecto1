<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    protected $table = 'asignacion';

    protected $primaryKey='id';
    
    protected $fillable = [
        'estudiante_id', 
        'codigo_ciclo',
        'anio',
    ];

    protected $guarded = [

    ];
}

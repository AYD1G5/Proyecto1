<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion_temporal extends Model
{
    protected $table = 'asignacion_temporal';

    protected $primaryKey='id';
    
    public $timestamps=false;
    
    protected $fillable = [
        'estudiante_id',
        'codigo_pensum',
    ];

    protected $guarded = [

    ];
}

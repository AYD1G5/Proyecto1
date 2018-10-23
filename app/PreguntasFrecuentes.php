<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntasFrecuentes extends Model
{
    protected $table = 'PreguntasFrecuentes';
    
    protected $primaryKey='id_pregunta';
    
    protected $fillable = [
        'pregunta', 
        'respuesta'
    ];

    protected $guarded = [

    ];
}

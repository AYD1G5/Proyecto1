<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carrera';

    protected $primaryKey='id_carrera';
    
    protected $fillable = [
        'codigo_carrera', 
        'nombre_carrera',
    ];

    protected $guarded = [

    ];
}

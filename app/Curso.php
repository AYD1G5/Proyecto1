<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'curso';

    protected $primaryKey='id_curso';
    
    protected $fillable = [
        'codigo_curso',
        'nombre_curso',
        'id_escuela',
        'id_area',
    ];

    protected $guarded = [

    ];
}

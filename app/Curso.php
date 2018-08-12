<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'curso';

    protected $primaryKey='codigo_curso';
    
    protected $fillable = [
        'codigo_curso',
        'nombre_curso',
        'codigo_escuela',
        'codigo_area',
    ];

    protected $guarded = [

    ];
}

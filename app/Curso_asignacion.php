<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso_asignacion extends Model
{
    protected $table = 'curso_asignacion';

    protected $primaryKey='id_curso_asignacion';

    protected $fillable = [
        'id_curso_pensum', 
        'id_asignacion',
        'id_catedratico'
    ];

    protected $guarded = [

    ];
}

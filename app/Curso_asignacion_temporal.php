<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso_asignacion_temporal extends Model
{
    protected $table = 'curso_asignacion_temporal';

    protected $primaryKey='id_curso_asig_temp';

    protected $fillable = [
        'id_curso_pensum', 
        'id_asignacion_temporal',
        'id_catedratico',
        'nota',
        'no_estrellas'
        ];

    protected $guarded = [

    ];
}

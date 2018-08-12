<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso_asignacion extends Model
{
    protected $table = 'curso_asignacion';

    protected $primaryKey=['id_curso_pensum', 'asignacion_id'];


    protected $fillable = [
        'id_curso_pensum', 
        'asignacion_id',
        'catedratico_id'
    ];

    protected $guarded = [

    ];
}

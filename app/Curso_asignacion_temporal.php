<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso_asignacion_temporal extends Model
{
    protected $table = 'curso_asignacion_temporal';

    protected $primaryKey=['id_curso_pensum', 'asig_t_id'];
    
    protected $fillable = [
        'id_curso_pensum', 
        'asig_t_id',
        'catedratico_id'
    ];

    protected $guarded = [

    ];
}

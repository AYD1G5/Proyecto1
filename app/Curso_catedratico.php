<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso_catedratico extends Model
{
    protected $table = 'curso_catedratico';

    protected $primaryKey= 'id_curso_catedratico';
    
    
    protected $fillable = [
        'id_curso_pensum',
        'id_catedratico',
    ];

    protected $guarded = [

    ];
}

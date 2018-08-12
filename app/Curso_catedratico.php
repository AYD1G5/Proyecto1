<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso_catedratico extends Model
{
    protected $table = 'curso_catedratico';

    protected $primaryKey=['codigo_curso', 'codigo_catedratico'];
    
    
    protected $fillable = [
        'codigo_curso',
        'codigo_catedratico',
    ];

    protected $guarded = [

    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso_prerequisito extends Model
{
    protected $table = 'curso_prerequisito';
    
    protected $primaryKey=['curso_pensum', 'codigo_curso'];
    
    protected $fillable = [
        'curso_pensum', 
        'codigo_curso',
    ];

    protected $guarded = [

    ];
}

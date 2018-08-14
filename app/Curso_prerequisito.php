<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso_prerequisito extends Model
{
    protected $table = 'curso_prerequisito';
    
    protected $primaryKey='id_curso_prerequisito';
    
    protected $fillable = [
        'id_curso_pensum', 
        'id_curso',
    ];

    protected $guarded = [

    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso_postrequisito extends Model
{
    protected $table = 'curso_postrequisito';
    
    protected $primaryKey=['curso_pensum', 'codigo_curso'];
    
    protected $fillable = [
        'curso_pensum', 
        'codigo_curso',
    ];

    protected $guarded = [

    ];
}

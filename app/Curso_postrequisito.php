<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso_postrequisito extends Model
{
    protected $table = 'curso_postrequisito';
    
    protected $primaryKey='id_curso_postrequisito';
    
    protected $fillable = [
        'id_curso_pensum', 
        'id_curso',
    ];

    protected $guarded = [

    ];
}

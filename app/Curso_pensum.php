<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso_pensum extends Model
{
    protected $table = 'curso_pensum';
 
    protected $primaryKey='id_curso_pensum';

    protected $fillable = [
        'id_curso',
        'id_pensum',
        'categoria',
        'creditos',
        'laboratorioboolean',
        'restriccion',
        'semestre'
    ];

    protected $guarded = [

    ];
}

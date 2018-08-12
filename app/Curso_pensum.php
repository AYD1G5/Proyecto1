<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso_pensum extends Model
{
    protected $table = 'curso_pensum';
 
    protected $primaryKey='id';

    protected $fillable = [
        'codigo_curso',
        'codigo_pensum',
        'categoria',
        'creditos',
        'laboratorioboolean',
        'restriccion',
        'semestre'
    ];

    protected $guarded = [

    ];
}

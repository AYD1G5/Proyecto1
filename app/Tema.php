<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    //
    protected $table = 'Tema';
 
    protected $primaryKey='id_tema';

    protected $fillable = [
        'id_curso',
        'id_estudiante',
        'texto'
    ];

    protected $guarded = [

    ];


}

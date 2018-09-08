<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante_Grupo extends Model
{
    protected $table = 'Estudiante_Grupo';
    
    protected $primaryKey='id_Estudiante_Grupo';
    
    protected $fillable = [
        'id_Estudiante', 
        'id_Grupo',

    ];

    protected $guarded = [

    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario_Grupo extends Model
{
    protected $table = 'Comentario_Grupo';
    
    protected $primaryKey='id_Comentario';
    
    protected $fillable = [
        'id_Tema_Grupo', 
        'id_estudiante',
        'texto'
    ];

    protected $guarded = [

    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema_Grupo extends Model
{
    protected $table = 'tema_grupo';
    
    protected $primaryKey='id_Tema_Grupo';
    
    protected $fillable = [
        'id_CreadorTema', 
        'id_Grupo',
        'Titulo',
        'Texto'
    ];

    protected $guarded = [

    ];
}


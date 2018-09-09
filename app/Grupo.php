<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupo';
    
    protected $primaryKey='id_Grupo';
    
    protected $fillable = [
        'id_Creador_Grupo', 
        'nombre'
    ];

    protected $guarded = [

    ];
}



$table->increments('');
            

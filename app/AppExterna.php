<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppExterna extends Model
{
    /**
     * modelo para realizar consultas a la base de datos en la tabla AppExterna    
    */
    protected $table = 'AppExterna';
    
    protected $primaryKey='id_AppExterna';
    
    protected $fillable = [
        'nombre',
        'ruta'
    ];

}

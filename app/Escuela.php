<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    protected $table = 'escuela';
    
    protected $primaryKey='id_escuela';
    
    protected $fillable = [
        'codigo_escuela', 
        'nombre_escuela',
    ];

    protected $guarded = [

    ];
}

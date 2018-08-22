<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';

    protected $primaryKey='id_rol';
    
    protected $fillable = [
        'nombre_rol'
    ];

    protected $guarded = [

    ];
}

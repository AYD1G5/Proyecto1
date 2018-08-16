<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pensum extends Model
{
    protected $table = 'pensum';

    protected $primaryKey='id_pensum';
    
    protected $fillable = [
        'codigo_pensum',
        'nombre_pensum',
        'codigo_carrera',
    ];

    protected $guarded = [

    ];
}

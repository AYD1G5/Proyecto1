<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormNuevoPensum extends Model
{
    protected $table = 'form_nuevo_pensum';
    
    protected $primaryKey='id';
    
    protected $fillable = [
        'codigo_pensum',
        'nombre_pensum',
        'id_carrera'
    ];

    protected $guarded = [

    ];
}

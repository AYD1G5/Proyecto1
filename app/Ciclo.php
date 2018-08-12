<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    protected $table = 'ciclo';

    protected $primaryKey='codigo_ciclo';
    
    public $timestamps=false;
    
    protected $fillable = [
        'codigo_ciclo', 
        'nombre_ciclo',
    ];

    protected $guarded = [

    ];
}

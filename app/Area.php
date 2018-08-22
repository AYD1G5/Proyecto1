<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'area';

    protected $primaryKey='id_area';

    protected $fillable = [
        'codigo_area',
        'nombre_area'
    ];

    protected $guarded = [

    ];
}

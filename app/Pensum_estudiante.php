<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pensum_estudiante extends Model
{
    protected $table = 'pensum_estudiante';

    protected $primaryKey=['estudiante_id', 'codigo_pensum'];
    
    protected $fillable = [
        'codigo_pensum',
        'estudiante_id',
    ];

    protected $guarded = [

    ];
}

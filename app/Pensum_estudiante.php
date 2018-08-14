<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pensum_estudiante extends Model
{
    protected $table = 'pensum_estudiante';

    protected $primaryKey='id_pensum_estudiante';
    
    protected $fillable = [
        'id_pensum',
        'id_estudiante',
    ];

    protected $guarded = [

    ];
}

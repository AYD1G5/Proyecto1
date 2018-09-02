<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    //
    protected $table = 'comentario';
 
    protected $primaryKey='id_comentario';

    protected $fillable = [
        'id_tema',
        'id_estudiante',
        'texto'
    ];

    protected $guarded = [

    ];
}

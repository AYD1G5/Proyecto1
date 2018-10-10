<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class solicitud extends Model
{
    protected $table = 'solicitudes';

    protected $primaryKey='solicitud_id';

    protected $fillable = [
        'no_estado', 
        'user_id',
        'amigo_id',
    ];

}

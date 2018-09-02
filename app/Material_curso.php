<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material_curso extends Model
{
    protected $table = 'material_curso';

    protected $primaryKey='id_material_curso';
    
    protected $fillable = [
                'id_curso_pensum',
                'id_material'
    ];

    protected $guarded = [

    ];
}

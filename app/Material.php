<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'material';

    protected $primaryKey='id_material';
    
    protected $fillable = [
            'nombre_archivo',
            'extension_archivo',
            'ruta_real_archivo',
            'tamano_archivo',
            'descripcion_archivo'
    ];

    protected $guarded = [

    ];
}

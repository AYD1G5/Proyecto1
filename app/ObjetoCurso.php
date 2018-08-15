<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjetoCurso extends Model
{

    protected $codigo_curso = '';
    protected $prerequisitos = [];
    protected $nombre_curso = '';
    protected $estado;
    protected $creditos; 
    protected $laboratorioboolean; 
    protected $restriccion;

    public function getPrerequisitos(){
        return $this->attributes['prerequisitos'];
    }
    public function setPrerequisito($value){
        $this->attributes['prerequisitos'] = $value;
    }

    
}

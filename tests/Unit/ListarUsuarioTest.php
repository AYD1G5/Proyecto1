<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListarUsuarioTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    //la funcionalidad de esta historia nos indica que deberiamos listar los usuario segun sus cursos
    //por lo tanto se procede a crear un metodo en donde testearemos la base de datos para luego proceder
    // a realizar la consulta y probar parte por parte haste que la consulta nos devuelva las tuplas esperadas
    public function testBD(){
      $catedraticos=DB::table('users as u')
      ->join('curso_catedratico as cc', 'u.id', '=', 'cc.id_catedratico')
      ->where('cc.id_curso_pensum', '=', $id)
      ->get();
      $data = $this->datosDeAsignacionTemporal();

      $curso_pensum = Curso_pensum::findOrFail($id);
      $curso = Curso::findOrFail($curso_pensum->id_curso);
      dd($catedraticos);
    }
}

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

  /*  public function testBD(){
      $catedraticos=DB::table('users as u')
      ->join('curso_catedratico as cc', 'u.id', '=', 'cc.id_catedratico')
      ->where('cc.id_curso_pensum', '=', $id)
      ->get();
      $data = $this->datosDeAsignacionTemporal();

      $curso_pensum = Curso_pensum::findOrFail($id);
      $curso = Curso::findOrFail($curso_pensum->id_curso);
      dd($catedraticos);
    }*/

    //Test1 BD listar usuarios respec
    public function testListarUsuarios(){
        $response = $this->get('/curso/material/listarmaterialdeapoyo/1/');
        $response->assertStatus(302);
    }

    //Test2 BD nos aseguramos que el usuario pertenezca a un grupo
    public function testGrupoUsuario()
    {
        $this->assertDatabaseHas('grupo', [
            'nombre' => 'Grupo1'
        ]);
    }

    //Test3 BD nos aseguramos que los usuarios a listar pertenezcan al curso que imparte el catedratico tal
    public function TestCatedraticoComun()
    {
        $this->assertDatabaseMissing('curso_catedratico', [
            'id_curso_catedratico' => '1'
        ]);
    }

    //Test4 BD nos aseguramos que el pertenezcamos al curso de matematica basica 1
    public function testCurso()
    {
        $this->assertDatabaseHas('curso', [
            'nombre_curso' => 'Matematica Basica 1'
        ]);
    }

    //Test5 BD nos aseguramos que el catedratico si este asignado a dar este curso
    public function testCatedraticoyCurso()
    {
        $this->assertDatabaseMissing('curso_catedratico', [
            'id_curso_catedratico' => '1'
        ]);
    }

    //Test6 BD nos aseguramos que los grupos tengan un usuario vigente     
    public function testVerificarEstudianteGrupo()
    {
        $this->assertDatabaseHas('grupo', [
            'id_Creador_Grupo' => '3'
        ]);
    }



}

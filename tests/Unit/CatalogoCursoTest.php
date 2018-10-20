<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\BuscadorCursoController;
use App\Asignacion_temporal;
use App\Pensum_estudiante;
use App\Curso;
use DB;


class CatalogoCursoTest extends TestCase
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

    /*
    *   Prueba para probar la correcta creacion de un curso y
    *   que su informacion se vea en el catalogo de cursos 
    */
    public function testBaseDatosCatalogoCurso(){
        /***Crear un curso en la base de datos*/
        $codigoCurso = 19;
        $cursoController=new BuscadorCursoController();
        $nuevoCurso = $cursoController->agregarCurso($codigoCurso, 'Quimica General 2', 1, 1, 1, 'Obligatorio', '10', 'Si', 0, 1);
        
        /** Retornar True si existe el curso */
        $validacionCurso = $cursoController->existeCurso($codigoCurso);

        /** Borrar el curso para no afectar la base de datos */
        DB::table('curso_pensum')->where('id_curso_pensum', $nuevoCurso->id_curso_pensum)->delete();
        DB::table('curso')->where('codigo_curso', $codigoCurso)->delete();

        $this->assertEquals(true, $validacionCurso);
    }


    /** 
     * Este Test Probara si existe la pagina catalogo de cursos
     * Es decir la pagina principal
     */
    public function testPaginaCatalogo(){
        /*** Iniciar sesion en la pagina */
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
        ]);

        /*** dirigirse a la pagina */
        $response = $this->get('/CatalogoCurso');
        $this->assertEquals(200, $response->getStatusCode());
    }

    /*** 
     * Ingresara un curso a la base de datos y comprobara que 
     * se ha creado su pagina de detalles
     */
    public function testCatalogoCursosoPaginaCurso()
    { 
        /*** Agregar un curso para prueba */
        $cursoController=new BuscadorCursoController();
        $codigoCurso = 53;
        $nuevoCurso = $cursoController->agregarCurso($codigoCurso, 'Quimica General 2', 1, 1, 1, 'Obligatorio', '10', 'Si', 0, 1);

        /** Iniciar sesion en la pagina */
        $response = $this->call('POST', '/login', [
            'email' => 'willyslider@gmail.com',
            'password' => '12345678',
            '_token' => csrf_token()
        ]);

        /*** Consultar la pagina del curso */
        $response = $this->get('/mostrarinfocurso/'.$nuevoCurso->id_curso_pensum);
            $this->assertEquals(200, $response->getStatusCode());
        DB::table('curso_pensum')->where('id_curso_pensum', $nuevoCurso->id_curso_pensum)->delete();
        DB::table('curso')->where('codigo_curso', $codigoCurso)->delete();
        
    }

    public function testCatalogosCursosExistentes()
    { 
        $this->assertDatabaseHas('curso', [
            'nombre_curso' => 'Matematica Basica 1'
        ]);
    }
}

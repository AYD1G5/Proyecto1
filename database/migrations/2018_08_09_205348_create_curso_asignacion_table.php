<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoAsignacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_asignacion', function (Blueprint $table) {
            $table->integer('id_curso_pensum')->unsigned();
            $table->foreign('id_curso_pensum')->references('id')->on('curso_pensum'); 
            $table->integer('asignacion_id')->unsigned();
            $table->foreign('asignacion_id')->references('id')->on('asignacion'); 
            $table->integer('catedratico_id')->unsigned();
            $table->foreign('catedratico_id')->references('id')->on('users'); 
            $table->primary(['id_curso_pensum', 'asignacion_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curso_asignacion');
    }
}

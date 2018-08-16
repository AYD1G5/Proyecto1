<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoAsignacionTemporalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_asignacion_temporal', function (Blueprint $table) {
            $table->increments('id_curso_asig_temp');
            $table->integer('id_curso_pensum')->unsigned();
            $table->foreign('id_curso_pensum')->references('id_curso_pensum')->on('curso_pensum'); 
            $table->integer('id_asignacion_temporal')->unsigned();
            $table->foreign('id_asignacion_temporal')->references('id_asignacion_temporal')->on('asignacion_temporal'); 
            $table->integer('id_catedratico')->unsigned();
            $table->foreign('id_catedratico')->references('id')->on('users'); 
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
        Schema::dropIfExists('curso_asignacion_temporal');
    }
}

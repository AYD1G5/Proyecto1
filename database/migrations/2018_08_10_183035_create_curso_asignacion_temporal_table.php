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
            $table->integer('id_curso_pensum')->unsigned();
            $table->foreign('id_curso_pensum')->references('id')->on('curso_pensum'); 
            $table->integer('asig_t_id')->unsigned();
            $table->foreign('asig_t_id')->references('id')->on('asignacion_temporal'); 
            $table->integer('catedratico_id')->unsigned();
            $table->foreign('catedratico_id')->references('id')->on('users'); 
            $table->primary(['id_curso_pensum', 'asig_t_id']);
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

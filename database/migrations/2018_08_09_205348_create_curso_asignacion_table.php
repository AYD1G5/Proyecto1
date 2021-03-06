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
            $table->increments('id_curso_asignacion');
            $table->integer('nota')->unsigned()->nullable();
            $table->integer('id_curso_pensum')->unsigned();
            $table->foreign('id_curso_pensum')->references('id_curso_pensum')->on('curso_pensum'); 
            $table->integer('id_asignacion')->unsigned();
            $table->foreign('id_asignacion')->references('id_asignacion')->on('asignacion'); 
            $table->integer('id_catedratico')->unsigned();
            $table->integer('no_estrellas')->unsigned()->nullable();
            $table->foreign('id_catedratico')->references('id')->on('users')->onUpdate('cascade'); 
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

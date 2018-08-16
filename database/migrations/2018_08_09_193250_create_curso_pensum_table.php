<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoPensumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_pensum', function (Blueprint $table) {
            $table->increments('id_curso_pensum');
            $table->integer('id_curso')->unsigned();
            $table->foreign('id_curso')->references('id_curso')->on('curso'); 
            $table->integer('id_pensum')->unsigned();
            $table->foreign('id_pensum')->references('id_pensum')->on('pensum'); 
            $table->string('categoria');
            $table->integer('creditos');
            $table->string('laboratorioboolean');
            $table->integer('restriccion');
            $table->integer('semestre');
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
        Schema::dropIfExists('curso_pensum');
    }
}

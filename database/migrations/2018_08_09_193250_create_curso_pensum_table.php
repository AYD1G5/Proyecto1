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
            $table->increments('id');
            $table->integer('codigo_curso')->unsigned();
            $table->foreign('codigo_curso')->references('codigo_curso')->on('curso'); 
            $table->integer('codigo_pensum')->unsigned();
            $table->foreign('codigo_pensum')->references('codigo_pensum')->on('pensum'); 
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

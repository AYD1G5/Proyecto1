<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso', function (Blueprint $table) {
            $table->increments('id_curso');
            $table->integer('codigo_curso')->unsigned();
            $table->string('nombre_curso');
            $table->text('descripcion')->nullable();
            $table->integer('id_escuela')->unsigned();
            $table->foreign('id_escuela')->references('id_escuela')->on('escuela');
            $table->integer('id_area')->unsigned();
            $table->foreign('id_area')->references('id_area')->on('area'); 
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
        Schema::dropIfExists('curso');
    }
}

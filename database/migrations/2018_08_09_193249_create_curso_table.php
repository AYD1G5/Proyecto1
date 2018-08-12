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
            $table->integer('codigo_curso')->unsigned();
            $table->primary(['codigo_curso']);
            $table->string('nombre_curso');
            $table->integer('codigo_escuela')->unsigned();
            $table->foreign('codigo_escuela')->references('codigo_escuela')->on('escuela');
            $table->integer('codigo_area')->unsigned();
            $table->foreign('codigo_area')->references('codigo_area')->on('area'); 
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

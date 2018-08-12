<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePensumEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pensum_estudiante', function (Blueprint $table) {
            $table->integer('estudiante_id')->unsigned();
            $table->foreign('estudiante_id')->references('id')->on('users'); 
            $table->integer('codigo_pensum')->unsigned();
            $table->foreign('codigo_pensum')->references('codigo_pensum')->on('pensum'); 
            $table->primary(['estudiante_id', 'codigo_pensum']);
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
        Schema::dropIfExists('pensum_estudiante');
    }
}

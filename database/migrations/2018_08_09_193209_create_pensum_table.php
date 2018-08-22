<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePensumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pensum', function (Blueprint $table) {
            $table->increments('id_pensum');
            $table->integer('codigo_pensum')->unsigned();
            $table->string('nombre_pensum');
            $table->integer('id_carrera')->unsigned();
            $table->foreign('id_carrera')->references('id_carrera')->on('carrera'); 
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
        Schema::dropIfExists('pensum');
    }
}

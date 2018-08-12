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
            //$table->increments('id');
            $table->integer('codigo_pensum')->unsigned();
            $table->primary(['codigo_pensum']);
            $table->string('nombre_pensum');
            $table->integer('codigo_carrera')->unsigned();
            $table->foreign('codigo_carrera')->references('codigo_carrera')->on('carrera'); 
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

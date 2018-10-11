<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormNuevoPensum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_nuevo_pensum', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo_pensum')->unsigned();
            $table->string('nombre_pensum');
            $table->integer('id_carrera')->unsigned();
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
        Schema::dropIfExists('form_nuevo_pensum');
    }
}

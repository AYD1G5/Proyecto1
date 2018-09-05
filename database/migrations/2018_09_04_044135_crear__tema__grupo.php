<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTemaGrupo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tema_Grupo', function (Blueprint $table) {
            $table->increments('id_Tema_Grupo');

            $table->integer('id_CreadorTema')->unsigned();
            $table->foreign('id_CreadorTema')->references('id')->on('users'); 

            $table->integer('id_Grupo')->unsigned();
            $table->foreign('id_Grupo')->references('id_Grupo')->on('Grupo'); 

            $table->string('Titulo');
            $table->string('Texto');

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
        Schema::dropIfExists('Tema_Grupo');
    }
}

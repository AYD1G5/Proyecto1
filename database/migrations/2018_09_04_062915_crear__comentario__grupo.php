<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearComentarioGrupo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Comentario_Grupo', function (Blueprint $table) {
            $table->increments('id_Comentario');

            $table->integer('id_Tema_Grupo')->unsigned();
            $table->foreign('id_Tema_Grupo')->references('id_Tema_Grupo')->on('Tema_Grupo'); 
        
            $table->integer('id_estudiante')->unsigned();
            $table->foreign('id_estudiante')->references('id')->on('users'); 
        
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
        Schema::dropIfExists('Comentario_Grupo');
    }
}

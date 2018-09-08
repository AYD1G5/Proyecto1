<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearEstudianteGrupo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Estudiante_Grupo', function (Blueprint $table) {
            $table->increments('id_Estudiante_Grupo');
            
            $table->integer('id_Estudiante')->unsigned();
            $table->foreign('id_Estudiante')->references('id')->on('users'); 

            $table->integer('id_Grupo')->unsigned();
            $table->foreign('id_Grupo')->references('id_Grupo')->on('Grupo'); 
            
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
        Schema::dropIfExists('Estudiante_Grupo');
    }
}

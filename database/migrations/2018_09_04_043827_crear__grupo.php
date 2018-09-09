<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearGrupo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Grupo', function (Blueprint $table) {
            $table->increments('id_Grupo');
            
            $table->integer('id_Creador_Grupo')->unsigned();
            $table->foreign('id_Creador_Grupo')->references('id')->on('users'); 
            
            $table->string('nombre');
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
        Schema::dropIfExists('Grupo');
    }
}

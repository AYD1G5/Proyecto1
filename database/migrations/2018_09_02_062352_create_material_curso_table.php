<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_curso', function (Blueprint $table) {
            $table->increments('id_material_curso');
            $table->integer('id_curso_pensum')->unsigned();
            $table->foreign('id_curso_pensum')->references('id_curso_pensum')->on('curso_pensum'); 
            $table->integer('id_material')->unsigned();
            $table->foreign('id_material')->references('id_material')->on('material'); 
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
        Schema::dropIfExists('curso_material');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoPrerequisitoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_prerequisito', function (Blueprint $table) {
            $table->increments('id_curso_prerequisito');
            $table->integer('id_curso_pensum')->unsigned();
            $table->foreign('id_curso_pensum')->references('id_curso_pensum')->on('curso_pensum');
            $table->integer('id_curso')->unsigned();
            $table->foreign('id_curso')->references('id_curso_pensum')->on('curso_pensum');
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
        Schema::dropIfExists('curso_prerequisito');
    }
}

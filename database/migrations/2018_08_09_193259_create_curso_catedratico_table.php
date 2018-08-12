<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoCatedraticoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_catedratico', function (Blueprint $table) {
            $table->integer('curso_pensum')->unsigned();
            $table->foreign('curso_pensum')->references('id')->on('curso_pensum'); 
            $table->integer('codigo_catedratico')->unsigned();
            $table->foreign('codigo_catedratico')->references('id')->on('users'); 
            $table->primary(['curso_pensum', 'codigo_catedratico']);
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
        Schema::dropIfExists('curso_catedratico');
    }
}

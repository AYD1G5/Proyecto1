<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ComentarioTemas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentariotemas', function (Blueprint $table) {
            $table->increments('comentariotema_id');
            $table->integer('user_id')->unsigned();
            $table->integer('tema_id')->unsigned();
            $table->integer('reportado')->default(0);
            $table->string('comentario');
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
        Schema::dropIfExists('comentariotemas');
    }
}

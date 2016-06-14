<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFotoDirectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos_directores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_foto');
            $table->integer('director_id')->unsigned();

            $table->foreign('director_id')->references('id')->on('directores')->onDelete('cascade')->onUpdate('cascade');    
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
        Schema::drop('fotos_directores');
    }
}

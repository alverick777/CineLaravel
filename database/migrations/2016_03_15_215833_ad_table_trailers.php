<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdTableTrailers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trailers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_trailer');
            $table->string('idioma');
            $table->string('name_peli');

            $table->integer('pelicula_id')->unsigned();            
                
            $table->foreign('pelicula_id')->references('id')->on('peliculas')->onDelete('cascade')->onUpdate('cascade');   
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
        Schema::drop('trailers');
    }
}

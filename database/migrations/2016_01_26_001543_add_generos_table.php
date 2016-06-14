<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGenerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {               

        Schema::create('generos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('genero');
            $table->string('tipo');
            $table->timestamps();
        });

        Schema::create('genero_pelicula', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('pelicula_id')->unsigned();
            $table->integer('genero_id')->unsigned();

            $table->foreign('pelicula_id')->references('id')->on('peliculas');   
            $table->foreign('genero_id')->references('id')->on('generos');       

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
        Schema::drop('generos');
    }
}

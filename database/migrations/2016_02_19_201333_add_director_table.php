<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDirectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->date('fecha_naci');
            $table->string('pais');
            $table->string('sexo');
            $table->text('biografia'); 
            $table->integer('oscars'); 
            $table->string('status_datos');       
            $table->timestamps();
        });


        Schema::create('director_serie', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('serie_id')->unsigned();
            $table->integer('director_id')->unsigned();

            $table->foreign('serie_id')->references('id')->on('series');   
            $table->foreign('director_id')->references('id')->on('directores');       

            $table->timestamps();
        });        

        Schema::create('director_pelicula', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('pelicula_id')->unsigned();
            $table->integer('director_id')->unsigned();

            $table->foreign('pelicula_id')->references('id')->on('peliculas');   
            $table->foreign('director_id')->references('id')->on('directores');       

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
        Schema::drop('directores');
    }
}

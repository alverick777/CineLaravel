<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->date('fecha_nac');
            $table->text('biografia');
            $table->integer('oscar');
            $table->string('sexo');                                   
            $table->string('pais'); 
            $table->string('status_datos');                                   
            $table->timestamps();
        });

            Schema::create('actor_pelicula', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('pelicula_id')->unsigned();
            $table->integer('actor_id')->unsigned();

            $table->foreign('pelicula_id')->references('id')->on('peliculas');   
            $table->foreign('actor_id')->references('id')->on('actores');       

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
        Schema::drop('actores');
    }
}

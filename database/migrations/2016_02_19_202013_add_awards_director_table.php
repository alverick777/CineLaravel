<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAwardsDirectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awards_director', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_premio');  // example: Best Writing, Original Screenplay
            $table->string('year_premio');  // año del premio
            $table->string('resultado');  // gano o fue nominado
            $table->string('nombre_pelioserie_premiada');  // nombre pelicula o serie
            $table->string('tipo_trabajo');  // si es pelicula o serie
            $table->string('year_pelioserie_premiada');  // año de la pelicula o serie
            $table->string('tipo'); //golden globe, oscar, etc


            $table->integer('director_id')->unsigned();

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
        Schema::drop('awards_director');
    }
}

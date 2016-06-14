<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAwardsActorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awards_actor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_premio');  // example: Best Writing, Original Screenplay
            $table->string('year_premio');  // año del premio
            $table->string('resultado');  // gano o fue nominado
            $table->string('nombre_pelioserie_premiada');
            $table->string('tipo_trabajo'); // si es pelicula o serie
            $table->string('year_pelioserie_premiada');
            $table->string('tipo'); //golden globe, oscar, etc

             $table->integer('actor_id')->unsigned();

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
        Schema::drop('awards_actor');
    }
}

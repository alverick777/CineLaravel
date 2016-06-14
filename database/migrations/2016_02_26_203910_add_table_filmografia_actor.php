<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableFilmografiaActor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmografia_actor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_peli_o_serie');
            $table->string('tipo_trabajo');
            $table->string('year_peli_o_serie');
            $table->string('nombre_personaje');
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
        Schema::drop('filmografia_actor');
    }
}

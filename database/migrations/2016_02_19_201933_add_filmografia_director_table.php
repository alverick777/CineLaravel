<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFilmografiaDirectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmografia_director', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_pelicula');
            $table->string('tipo_trabajo');
            $table->string('year_pelicula');
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
        Schema::drop('filmografia_director');
    }
}

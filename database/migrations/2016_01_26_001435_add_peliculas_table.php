<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo_castellano');
            $table->string('titulo_original');            
            $table->string('year');
            $table->string('duracion');
            $table->string('guion');
            $table->string('musica');
            $table->string('produccion');
            $table->string('distribuidora');
            $table->string('cast');            
            $table->string('rating');
            $table->integer('suma_estrellas');
            $table->integer('total_votos');
            $table->text('sinopsis');
            $table->string('oscar'); 
            $table->string('year_oscar'); 
            $table->string('status_poster'); 
            $table->string('status_datos');     

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
        Schema::drop('peliculas');
    }
}
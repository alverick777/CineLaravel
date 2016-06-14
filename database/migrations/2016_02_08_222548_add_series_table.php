<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo_serie');            
            $table->string('rating');
            $table->integer('suma_estrellas');
            $table->integer('total_votos');
            $table->string('year_serie_inicio');
            $table->string('year_serie_termino');
            $table->string('cast');   
            $table->text('sinopsis');
            $table->string('temporadas');
            $table->string('status_datos');
            $table->string('status_poster');  

            $table->timestamps();
        });   

         Schema::create('actor_serie', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('serie_id')->unsigned();
            $table->integer('actor_id')->unsigned();

            $table->foreign('serie_id')->references('id')->on('series');   
            $table->foreign('actor_id')->references('id')->on('actores');       

            $table->timestamps();
        });

        Schema::create('genero_serie', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('serie_id')->unsigned();
            $table->integer('genero_id')->unsigned();

            $table->foreign('serie_id')->references('id')->on('series');   
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
        Schema::drop('series');
    }
}

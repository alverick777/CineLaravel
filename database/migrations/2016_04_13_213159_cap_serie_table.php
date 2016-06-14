<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CapSerieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capitulos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_capitulo');
            $table->string('nombre_capitulo_castellano');
            $table->string('fecha_estreno');
            $table->string('guionista');
            $table->string('director');
            $table->string('duracion');
            $table->string('link_imdb');
            $table->string('num_capi_temp');
            $table->string('num_capi_general');
            $table->string('rating');
            $table->integer('suma_estrellas');
            $table->integer('total_votos');
            $table->string('color_barra');
            $table->string('temporada');
            $table->text('sinopsis_capitulo');
            $table->text('descripcion_capitulo');

            $table->integer('serie_id')->unsigned();

            $table->foreign('serie_id')->references('id')->on('series'); 
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
        Schema::drop('capitulos');
    }
}

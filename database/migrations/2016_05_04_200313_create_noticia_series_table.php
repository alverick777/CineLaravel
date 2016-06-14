<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiaSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticia_series', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('foto');

            $table->integer('serie_id')->unsigned();            
                
            $table->foreign('serie_id')->references('id')->on('series')->onDelete('cascade')->onUpdate('cascade');  
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
        Schema::drop('noticia_series');
    }
}

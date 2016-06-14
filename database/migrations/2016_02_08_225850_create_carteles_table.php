<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carteles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('pelicula_id')->unsigned();            
                
            $table->foreign('pelicula_id')->references('id')->on('peliculas')->onDelete('cascade')->onUpdate('cascade');            
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
        Schema::drop('carteles');
    }
}
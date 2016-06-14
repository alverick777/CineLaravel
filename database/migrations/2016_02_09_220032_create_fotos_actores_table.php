<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotosActoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos_actores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_foto');
            $table->integer('actor_id')->unsigned();

            $table->foreign('actor_id')->references('id')->on('actores')->onDelete('cascade')->onUpdate('cascade');            

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
        Schema::drop('fotos_actores');
    }
}

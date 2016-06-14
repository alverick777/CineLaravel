<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiaActorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticia_actors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('foto');

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
        Schema::drop('noticia_actors');
    }
}

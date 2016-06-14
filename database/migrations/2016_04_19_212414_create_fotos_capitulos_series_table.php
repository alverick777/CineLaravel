<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotosCapitulosSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos_capitulos_series', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombrefoto');
            $table->string('portadaYesNo');
            $table->integer('capitulo_id')->unsigned();

            $table->foreign('capitulo_id')->references('id')->on('capitulos')->onDelete('cascade')->onUpdate('cascade');    

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
        Schema::drop('fotos_capitulos_series');
    }
}

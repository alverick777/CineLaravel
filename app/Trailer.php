<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trailer extends Model
{
    protected $table = "trailers";

    protected $fillable = ['name_trailer','idioma','pelicula_id','name_peli'];

    public function pelicula(){
			return $this->belongsTo('App\Pelicula');    	
      }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartel extends Model
{
      protected $table = "carteles";

      protected $fillable = ['name','pelicula_id'];

      public function pelicula(){
			return $this->belongsTo('App\Pelicula');    	
      }
      
}

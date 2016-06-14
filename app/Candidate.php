<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
     protected $table = "candidates";

     protected $fillable = ['nombre_candidata','pelicula_id'];

     public function pelicula(){
			return $this->belongsTo('App\Pelicula');    	
     }

}

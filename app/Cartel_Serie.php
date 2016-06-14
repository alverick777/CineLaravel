<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartel_Serie extends Model
{

      protected $table = "carteles_Series";

      protected $fillable = ['name','serie_id'];

    public function serie(){
			return $this->belongsTo('App\Serie');    	
      }
}

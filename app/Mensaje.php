<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = "mensajes";

    protected $fillable = ['mensaje','leido','user_sender','user_id'];

     public function user(){
			return $this->belongsTo('App\User');    	
      }

}

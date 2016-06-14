<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
      protected $table = "avatars";

      protected $fillable = ['name','user_id'];

      public function user(){
			return $this->belongsTo('App\User');    	
      }
}

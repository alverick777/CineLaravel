<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
     protected $table = "generos";

    protected $fillable = ['genero','tipo'];

    public function peliculas(){
    	return $this->belongsToMany('App\Pelicula')->withTimestamps();
    }

    public function series(){
    	return $this->belongsToMany('App\Serie')->withTimestamps();
    }

   public function scopeSearchFilter($query, $name){
   		return $query->where('genero', '=', $name);   		
   }

}

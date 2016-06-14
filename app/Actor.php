<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = "actores";

    protected $fillable = ['nombre', 'fecha_nac', 'biografia', 'oscar', 'sexo','pais','status_datos'];

    public function peliculas(){
    	return $this->belongsToMany('App\Pelicula')->withTimestamps();
    }

    public function series(){
    	return $this->belongsToMany('App\Serie')->withTimestamps();
    }

   public function foto(){
        return $this->hasMany('App\FotoActor');
    }

     public function filmografias(){
        return $this->hasMany('App\FilmografiaActor');
    }

    public function awards(){
        return $this->hasMany('App\AwardsActor');
    }

    public function noticias(){
        return $this->hasMany('App\NoticiaActor');
   }

     public function scopeSearchFilterporSexo($query, $sexo){
      if ($sexo == "M") {
          return $query->where('sexo', '=', 'M');
      }else{
          return $query->where('sexo', '=', 'F');        
      }

   }

   public function scopeSearchFilterporLetra($query, $letra){              
          return $query->where('nombre', 'LIKE', $letra .'%');     
    }

   public function scopeSearchforWord($query, $word){
      return $query->where('nombre','LIKE','%'. $word .'%');
   }

   public function scopeSearchactor($query, $nombre){
      return $query->where('nombre','LIKE','%'. $nombre .'%');
   }

}

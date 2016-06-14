<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    protected $table = "peliculas";

    protected $fillable = ['titulo_castellano','titulo_original','year','duracion','guion','musica','produccion','distribuidora','cast','rating','suma_estrellas','total_votos','oscar','year_oscar','sinopsis','status_poster','status_datos'];
   
   public function generos(){
    	return $this->belongsToMany('App\Genero')->withTimestamps();
   }

   public function actores(){
    	return $this->belongsToMany('App\Actor')->withTimestamps();
   }

   public function carteles(){
   		return $this->hasMany('App\Cartel');
   }

   public function directores(){
        return $this->belongsToMany('App\Director')->withTimestamps();
   }

   public function trailers(){
      return $this->hasMany('App\Trailer');
   }

   public function noticias(){
        return $this->hasMany('App\NoticiasPrincipal');
   }

  public function candidatas(){
      return $this->hasMany('App\Candidate');
  }

  public function scopeSearchFilterporLetra($query, $letra){
      if ($letra == "num") {
          return $query->where('titulo_original', 'LIKE', '0%')
                       ->orwhere('titulo_original', 'LIKE', '1%')
                       ->orwhere('titulo_original', 'LIKE', '2%')
                       ->orwhere('titulo_original', 'LIKE', '3%')
                       ->orwhere('titulo_original', 'LIKE', '4%')
                       ->orwhere('titulo_original', 'LIKE', '5%')
                       ->orwhere('titulo_original', 'LIKE', '6%') 
                       ->orwhere('titulo_original', 'LIKE', '7%')
                       ->orwhere('titulo_original', 'LIKE', '8%')
                       ->orwhere('titulo_original', 'LIKE', '9%');
      }else{
          return $query->where('titulo_original', 'LIKE', $letra .'%');        
      }

   }


   public function scopeSearchforWord($query, $word){
      return $query->where('titulo_original','LIKE','%'. $word .'%');
   }

   public function scopeSearchpelicula($query, $titulo){
      return $query->where('titulo_original','LIKE','%'. $titulo .'%');
   }

}

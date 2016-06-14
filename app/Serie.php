<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table = "series";

    protected $fillable = ['titulo_serie','director','rating','suma_estrellas','total_votos','year_serie_inicio','year_serie_termino','cast','sinopsis','temporadas','status_datos','status_poster'];

    public function actores(){
    	return $this->belongsToMany('App\Actor')->withTimestamps();
    }

	public function carteles(){
   		return $this->hasMany('App\Cartel_Serie');
    }   

     public function generos(){
    	return $this->belongsToMany('App\Genero')->withTimestamps();
    }

    public function directores(){
        return $this->belongsToMany('App\Director')->withTimestamps();
    } 
  
    public function capitulos(){
        return $this->hasMany('App\Capitulo');
    }

    public function noticias(){
        return $this->hasMany('App\NoticiaSerie');
   }

    public function scopeSearchFilterporLetra($query, $letra){
      if ($letra == "num") {
          return $query->where('titulo_serie', 'LIKE', '0%')
                       ->orwhere('titulo_serie', 'LIKE', '1%')
                       ->orwhere('titulo_serie', 'LIKE', '2%')
                       ->orwhere('titulo_serie', 'LIKE', '3%')
                       ->orwhere('titulo_serie', 'LIKE', '4%')
                       ->orwhere('titulo_serie', 'LIKE', '5%')
                       ->orwhere('titulo_serie', 'LIKE', '6%') 
                       ->orwhere('titulo_serie', 'LIKE', '7%')
                       ->orwhere('titulo_serie', 'LIKE', '8%')
                       ->orwhere('titulo_serie', 'LIKE', '9%');
      }else{
          return $query->where('titulo_serie', 'LIKE', $letra .'%');        
      }

   }

    public function scopeSearchforWord($query, $word){
      return $query->where('titulo_serie','LIKE','%'. $word .'%');
   }

   public function scopeSearchserie($query, $titulo){
      return $query->where('titulo_serie','LIKE','%'. $titulo .'%');
   }

}

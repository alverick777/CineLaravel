<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $table = "directores";

    protected $fillable = ['nombre', 'fecha_naci', 'pais', 'sexo','biografia','status_datos'];

    public function filmografias(){
        return $this->hasMany('App\FilografiaDirector');
    }

    public function awards(){
        return $this->hasMany('App\AwardsDirector');
    }

    public function foto(){
        return $this->hasMany('App\FotoDirector');
    }

    public function series(){
        return $this->belongsToMany('App\Serie')->withTimestamps();
    }

    public function peliculas(){
        return $this->belongsToMany('App\Pelicula')->withTimestamps();
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
  
   public function scopeSearchdirector($query, $nombre){
      return $query->where('nombre','LIKE','%'. $nombre .'%');
   }

}

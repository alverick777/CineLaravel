<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoticiasPrincipal extends Model
{
    protected $table = "noticias_principal";

    protected $fillable = ['titulo','descripcion','foto','pelicula_id'];


    public function pelicula()
    {
        return $this->belongsTo('App\Pelicula');
    }

}

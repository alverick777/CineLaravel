<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capitulo extends Model
{
    protected $table = "capitulos";

    protected $fillable = ['nombre_capitulo','nombre_capitulo_castellano','fecha_estreno','guionista','director','duracion','link_imdb','num_capi_temp','num_capi_general','rating','suma_estrellas','total_votos','color_barra','temporada','sinopsis_capitulo','descripcion_capitulo', 'serie_id'];

    public function serie(){
        return $this->belongsTo('App\Serie');
    }

    public function fotos(){
        return $this->hasMany('App\FotosCapitulosSeries');
    }

}

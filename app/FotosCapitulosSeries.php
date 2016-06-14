<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotosCapitulosSeries extends Model
{
    
	protected $table = "fotos_capitulos_series";

    protected $fillable = ['nombrefoto','portadaYesNo','capitulo_id'];


    public function capitulo(){
        return $this->belongsTo('App\Capitulo');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmografiaActor extends Model
{
    protected $table = "filmografia_actor";

    protected $fillable = ['name_peli_o_serie','year_peli_o_serie','tipo_trabajo','nombre_personaje','actor_id'];

    public function actor(){
		return $this->belongsTo('App\Actor');
    }

}

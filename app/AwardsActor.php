<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AwardsActor extends Model
{
    protected $table = "awards_actor";

    protected $fillable = ['nombre_premio', 'year_premio', 'resultado','nombre_pelioserie_premiada','tipo_trabajo','year_pelioserie_premiada','tipo','actor_id'];

    public function actor(){
		return $this->belongsTo('App\Actor');
    }
}

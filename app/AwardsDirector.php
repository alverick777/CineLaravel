<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AwardsDirector extends Model
{
    protected $table = "awards_director";

    protected $fillable = ['nombre_premio', 'year_premio', 'resultado','nombre_pelioserie_premiada','tipo_trabajo','year_pelioserie_premiada','tipo','director_id'];

    public function director(){
		return $this->belongsTo('App\Director');
    }


}

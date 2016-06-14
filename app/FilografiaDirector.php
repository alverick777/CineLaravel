<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilografiaDirector extends Model
{
	
	protected $table = "filmografia_director";

    protected $fillable = ['nombre_pelicula', 'year_pelicula', 'tipo_trabajo','director_id'];


    public function director(){
			return $this->belongsTo('App\Director');
     }
}

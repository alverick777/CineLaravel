<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoDirector extends Model
{
    
    protected $table = "fotos_directores";

    protected $fillable = ['name_foto','director_id'];

    public function director(){
        return $this->belongsTo('App\Director');
    }
}

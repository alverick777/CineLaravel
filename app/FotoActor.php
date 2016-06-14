<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoActor extends Model
{
    protected $table = "fotos_actores";

    protected $fillable = ['name_foto','actor_id'];

    public function actor(){
        return $this->belongsTo('App\Actor');
    }

}

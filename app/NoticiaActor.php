<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoticiaActor extends Model
{
    protected $table = "noticia_actors";

    protected $fillable = ['titulo','descripcion','foto','actor_id'];


    public function actor()
    {
        return $this->belongsTo('App\Actor');
    }
}

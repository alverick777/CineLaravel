<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoticiaSerie extends Model
{
    protected $table = "noticia_series";

    protected $fillable = ['titulo','descripcion','foto','serie_id'];


    public function serie()
    {
        return $this->belongsTo('App\Serie');
    }
}

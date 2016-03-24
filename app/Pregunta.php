<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = "preguntas";

    protected $fillable = ['pregunta','opciones'];

    public function opciones(){
    	return $this->hasMany('App\Opcion');
    }
}

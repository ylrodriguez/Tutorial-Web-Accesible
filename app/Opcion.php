<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
    protected $table = "opciones";

    protected $fillable = ['descripcion','puntaje'];

    public function pregunta(){
    	return $this->belongsTo('App\Pregunta');
    }




}

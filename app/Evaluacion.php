<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
     protected $table = 'evaluaciones';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion' ,'leccion_id','user_id'
    ];


    public function preguntas(){
    	return $this->hasMany('App\Pregunta');
    }

    public function leccion(){
    	return $this->belongsTo('App\Leccion');
    }

    public function users(){
        return $this->belongsToMany('App\User','user_evaluacion')->withPivot('id','puntaje','intentos')->withTimestamps(); 
        //Define modelo y la tabla pivot.
    }



}

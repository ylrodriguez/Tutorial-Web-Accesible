<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = "cursos";

    protected $fillable = ['titulo','descripcion','imagen'];

    public function lecciones(){
    	return $this->hasMany('App\Leccion');
    }

    public function users(){
        return $this->belongsToMany('App\User','user_curso')->withPivot('progreso','fecha_fin')->withTimestamps(); 
        //Define modelo y la tabla pivot.
    }
}

<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Leccion extends Model implements SluggableInterface
{

    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'titulo',
        'save_to'    => 'slug',
        'on_update'  => true
    ];

    protected $table = "lecciones";

    protected $fillable = ['curso_id','titulo','descripcion','teoria','linkvideo'];

    public function curso(){
    	return $this->belongsTo('App\Curso');
    }

    public function comentarios(){
    	return $this->hasMany('App\Comentario');
    }

    public function users(){
        return $this->belongsToMany('App\User','user_leccion')->withPivot('state','id','fecha_fin')->withTimestamps(); 
        //Define modelo y la tabla pivot.
    }

    public function evaluaciones(){
        return $this->hasMany('App\Evaluacion');
    }

    public function hasEvaluacion(){
        return (bool) $this->evaluaciones()->first();
    }

}

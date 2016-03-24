<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
	protected $table = "comentarios";

	protected $fillable = ['user_id','leccion_id','descripcion','created_at'];

	public function leccion(){
		return $this->belongsTo('App\Leccion');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}
}

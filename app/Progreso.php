<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progreso extends Model
{
	//
    public static function calcularProgreso($curso_id, $user_id){
    	
    	$user = User::find($user_id);
    	$user->cursos;
    	$lecciones = Curso::find($curso_id)->lecciones;
    	$numFactores = count($lecciones) * 3; //3 porque se toma inicio, final y evaluacion de leccion
    	$valorFactor = 100/$numFactores;
    	$progresoTotal = 0;



    	foreach ($user->lecciones as $leccion) {
    		if($leccion->pivot->state == 'started'){
    			$progresoTotal += $valorFactor;
    		}
    		else if($leccion->pivot->state == 'finished'){
    			$progresoTotal += $valorFactor * 2;
    		}
    	}

    	foreach ($user->evaluaciones as $evaluacion) {
    		$progresoTotal += $valorFactor;
    	}

    	foreach ($user->cursos as $curso) {
    		if ($curso_id == $curso->id) {
    			$curso->pivot->progreso = $progresoTotal;
    			$curso->pivot->save();
    		}
    	}



    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use App\Progreso;
use App\Leccion;
use App\Country;
use App\Evaluacion;
use Carbon\Carbon;

class ProgresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
        setlocale(LC_TIME,'es');
        Carbon::setlocale('es');
    }

    public function index(){

    	$user = Auth::user();

    	$user->cursos;
    	$user->lecciones;
    	$user->evaluaciones;
    	$user->codePais = strtolower($user->pais);
    	$user->pais = Country::country_code_to_country($user->pais);
        $user->dateCarbon= $user->created_at->formatLocalized('%d %B %Y');
        $user->diasTutorial = $user->created_at->diffInDays();

        if (Auth::user()->type == 'admin') {
            return view ('admin.progreso.index')->with('user',$user);
        } else {
            return view ('member.progreso.index')->with('user',$user);
        }
        
    	
    }

    
    public function leccionProgreso(){
        $user = Auth::user();
        $lecciones = $user->lecciones;
        $started = 0;
        $finished = 0;
        $response = array();

        foreach ($lecciones as $leccion) {
            if ($leccion->pivot->state == "started") {
                $started += 1;
            }
            if ($leccion->pivot->state == "finished") {
                $finished += 1;
            }
        }

        if($finished > 0){
            $response[] = array('Completado',$finished);
        }
        if($started > 0){
          $response[] = array('Empezado',$started);
      }
        

          return json_encode($response);

    }

    public function evaluacionProgreso(){
        $user = Auth::user();
        $evaluaciones = $user->evaluaciones;
        $aprobada = 0;
        $noAprobada = 0;
        $response = array();

        foreach ($evaluaciones as $evaluacion) {
            if ($evaluacion->pivot->puntaje >= 80) {
                $aprobada += 1;
            }
            if ($evaluacion->pivot->puntaje < 80) {
                $noAprobada += 1;
            }
        }

        if($aprobada > 0){
            $response[] = array('Aprobadas',$aprobada);
        }
        if($noAprobada > 0){
          $response[] = array('No aprobadas',$noAprobada);
      }
        

          return json_encode($response);

    }
}

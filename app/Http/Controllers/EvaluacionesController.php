<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Evaluacion;
use App\Leccion;
use App\Curso;
use App\Progreso;
use App\Opcion;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EvaluacionRequest;


class EvaluacionesController extends Controller
{

    public function index()
    {
        $evaluaciones = Evaluacion::all();
        $response = array();

        foreach ($evaluaciones as $evaluacion) {
            $evaluacion->leccion;
            $evaluacion->users;
            $puntajePromedio = 0;
            foreach ( $evaluacion->users as $user ) {
                $puntajePromedio += $user->pivot->puntaje;
            }

            $puntajePromedio = $puntajePromedio/count($evaluacion->users);
            $response[]  = array($evaluacion->leccion->titulo,$puntajePromedio);
        }

        return json_encode($response);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function show($id)
     {
        $flag = false;
        $leccion = Leccion::find($id);
        $leccion->evaluaciones;

        if ($leccion->hasEvaluacion()) {
            $flag = true;
            return array('leccion'=>$leccion,'flag'=>$flag); 
        }
        else{
            return array('leccion'=>$leccion,'flag'=>$flag); 
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EvaluacionRequest $request, $id)
    {   
        //Llama al controlador correcto
        if($id == 'create'){return $this->create($request);}

        else{
            $leccion = Leccion::find($request->leccion_id);
            $evaluacion = $leccion->evaluaciones->first();
            $evaluacion->fill($request->all());

            $evaluacion->save();

            Flash::warning('¡Se ha editado la evaluación de la lección "'.$leccion->titulo.'"!');
            return redirect()->route('admin.cursos.lecciones.show', array('id' => $request->curso_id));
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(EvaluacionRequest $request)
    {
        $leccion = Leccion::find($request->leccion_id);
        $evaluacion = new Evaluacion($request->all());
        $evaluacion->save();

        Flash::success('¡Se ha creado la evaluación de la lección "'.$leccion->titulo.'"!');
        return redirect()->route('admin.cursos.lecciones.show', array('id' => $request->curso_id));
    }

    public function saveEvaluacion($id,Request $request){

        $evaluacion = Evaluacion::find($id);
        $leccion = $evaluacion->leccion;
        $preguntas = $evaluacion->preguntas;
        $numPreguntas = count($preguntas);
        $puntajeFinal = 0;
        

        foreach ($preguntas as $pregunta) {
            $idPre = $pregunta->id;
            $string = 'radioEvaluacion'.$idPre;
            $opcion = Opcion::find($request->$string);
            
            if($opcion->puntaje == 'correcto'){
               $puntajeFinal += 100/$numPreguntas;
           }
       }


        //Users <--> Evaluacion
        $user_evaluacion = $evaluacion->users;
        $flag = 0;   // 0 -> Primera vez del usuario haciendo esta evaluacion.
                     // 1 -> Ya ha estado en esta evaluacion. 

        foreach ($user_evaluacion as $user) {
            if(Auth::user()->id == $user->id){
                $flag = 1;
                break;
            }    
        }

        if($flag == 0){
            $evaluacion->users()->attach(Auth::user()->id, array('puntaje' => $puntajeFinal,'intentos' => 1));
            Auth::user()->puntos += $puntajeFinal;
            Auth::user()->save();
            Progreso::calcularProgreso($leccion->curso->id,Auth::user()->id);
        }
        else{
            $registroPivot = $evaluacion->users()->where([['user_id',Auth::user()->id],['evaluacion_id',$evaluacion->id]])->first();
            $intentos = $registroPivot->pivot->intentos;


                    if($intentos != 5){//5 demasiados intentos
                     //Proceso nuevo puntaje
                        $puntajeAnterior = $registroPivot->pivot->puntaje;
                        Auth::user()->puntos -= $puntajeAnterior;

                        $puntajePromedio = (($registroPivot->pivot->puntaje * $intentos) + $puntajeFinal);
                        $intentos++;
                        $puntajePromedio = $puntajePromedio/$intentos;

                        $registroPivot->pivot->puntaje = $puntajePromedio;
                        $registroPivot->pivot->intentos = $intentos;
                        $registroPivot->pivot->save();

                        Auth::user()->puntos += $puntajePromedio;
                        Auth::user()->save();
                        Progreso::calcularProgreso($leccion->curso->id,Auth::user()->id);
                    }

                    
                }

                if (Auth::user()->type == "admin") {
                    return redirect()->route('admin.cursos.lecciones.showLesson',['id' => $request->leccion_id, 'num'=> $request->num, 'slug'=>$request->slug]);
                } else {
                    return redirect()->route('member.cursos.lecciones.showLesson',['id' => $request->leccion_id, 'num'=> $request->num, 'slug'=>$request->slug]);
                }

            }
        }

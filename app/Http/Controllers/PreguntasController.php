<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Leccion;
use App\Curso;
use App\Evaluacion;
use App\Pregunta;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PreguntaRequest;

class PreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        $leccion = Leccion::find($id);
        $evaluacion = Evaluacion::find($leccion->evaluaciones[0]->id);
        
        $preguntas = $evaluacion->preguntas;

        return $preguntas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PreguntaRequest $request)
    {

        $leccion = Leccion::find($request->leccion_id);
        
        $pregunta = new Pregunta($request->all()); 
        $pregunta->evaluacion_id=  $leccion->evaluaciones[0]->id;
        $pregunta->save();
        return "Se ha guardado!";
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pregunta = Pregunta::find($id);
        $pregunta->delete();

        return "Se ha eliminado";
    }



}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Leccion;
use App\Curso;
use App\Evaluacion;
use App\Pregunta;
use App\Opcion;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OpcionRequest;

class OpcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        $pregunta = Pregunta::find($id);
        $opciones = $pregunta->opciones;
        return $opciones;
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OpcionRequest $request)
    {
        
        $opcion = new Opcion($request->all()); 
        $opcion->pregunta_id=  $request->pregunta_id;
        $opcion->save();
        return "Se ha guardado opcion!";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   

        $opciones =  Opcion::all();
        foreach ($opciones as $opcion){
            if($request->pregunta_id == $opcion->pregunta_id){
                if($opcion->id == $id){
                   $opcion->puntaje = "correcto";
                   $opcion->save();
                }
                else{
                    $opcion->puntaje = "incorrecto";
                    $opcion->save();
                }
            }
        }

        Flash::warning('¡Se ha editado la información de la evaluación!');
        return 'Se ha editado la opcion';
    }


        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $opcion = Opcion::find($id);
        $opcion->delete();

        return "Se ha eliminado la opcion";
    }
}

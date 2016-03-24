<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Leccion;
use App\Curso;
use App\Progreso;
use App\Evaluacion;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LeccionesController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    

    public function countLecciones(){
        $lecciones = Leccion::all();
        $response = array();
        foreach ($lecciones as $leccion ) {
            $response[]  = array($leccion->titulo,count($leccion->users));
        }
        
       return json_encode($response);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create($curso_id)
    {

     $curso = Curso::find($curso_id);
     return view('admin.cursos.lecciones.create')->with('curso',$curso);
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $leccion = new Leccion($request->all());
        $curso = Curso::find($request->curso_id);
        $leccion->curso_id = $curso->id;
        $leccion->save();

        Flash::success('¡Se ha creado una nueva leccion!');
        return redirect()->route('admin.cursos.lecciones.show', array('id' => $curso->id));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $lecciones = Leccion::where('curso_id',$id)->orderBy('created_at','ASC')->paginate(10);
        $curso = Curso::find($id);
        $curso->users;
        
        $lecciones->each(function($lecciones){
            $lecciones->comentarios;
            $lecciones->curso;
            $lecciones->users; 
            $lecciones->evaluaciones;
        });

        
        if (Auth::user()->type == 'admin') {
         return view ('admin.cursos.lecciones.index')->with(['lecciones'=>$lecciones, 'curso'=>$curso]);
        } else {
        return view ('member.cursos.lecciones.index')->with(['lecciones'=>$lecciones, 'curso'=>$curso]);
    }
    
    

    
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leccion = Leccion::find($id);
        $leccion->curso;
        return view ('admin.cursos.lecciones.edit')->with('leccion',$leccion);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {

      $leccion = Leccion::find($id);
      $leccion->curso;
      
      $leccion->delete();

      Flash::error('La lección '.$leccion->titulo.' ha sido eliminada de forma exitosa.');
      return redirect()->route('admin.cursos.lecciones.show', array('id' => $leccion->curso)); 
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
        //En vez de $request->id tambien se puede: dd(Input::get('id'));
        
        $leccion = Leccion::find($id);
        $leccion->fill($request->all()); //Reemplaza datos de objeto con los nuevos

        $leccion->save();

        Flash::warning('La leccion: "'.$leccion->titulo.'" ha sido modificada.');
        return redirect()->route('admin.cursos.lecciones.show', array('id' => $request->curso_id));   
    }

    public function showLesson($slug, Request $request)
    {   

        $id = $request->id;
        $leccion = Leccion::find($id);
        $leccion->comentarios;
        $leccion->curso;
        $leccion->users;
        $leccion->evaluaciones;
        $test = "";
        
        foreach ($leccion->evaluaciones as $evaluacion) {
         $evaluacion->preguntas;
         $evaluacion->users;
         $test = Evaluacion::find($evaluacion->id);

         foreach ($evaluacion->preguntas as $pregunta) {
             $pregunta->opciones;
         };
     }


     $curso = $leccion->curso;
     
     $user_curso = $curso->users;
        $flag = 0; // 0 -> Primera vez del usuario en este curso.
                   // 1 -> Ya ha estado en este curso. 

        //Users <--> Curso
        foreach ($user_curso as $user) {
            if(Auth::user()->id == $user->id){
                $flag = 1;
                break;
            }    
        }

        // Agregando en tabla muchos a muchos y en tabla pivot
        if($flag == 0){
            $curso->users()->attach(Auth::user()->id, array('progreso' => 1));
            Auth::user()->puntos += 30;
            Auth::user()->save();
        }

        //User <---> Evaluacion
        $registroPivot = null;
        
        if($test != ""){
            $registroPivot = $test->users()->where([['user_id',Auth::user()->id],['evaluacion_id',$test->id]])->first();}

            if($registroPivot == null){
                if (Auth::user()->type == 'admin') {
                    return view ('admin.cursos.lecciones.indexLesson')->with(['leccion'=>$leccion, 'curso'=>$leccion->curso, 'num'=>$request->num]);
                } else {
                    return view ('member.cursos.lecciones.indexLesson')->with(['leccion'=>$leccion, 'curso'=>$leccion->curso, 'num'=>$request->num]);
                }
            }
            else{
               if (Auth::user()->type =='admin') {
                 return view ('admin.cursos.lecciones.indexLesson')->with(['leccion'=>$leccion, 'curso'=>$leccion->curso, 'num'=>$request->num, 'pivot'=>$registroPivot->pivot]);
             } else {
                return view ('member.cursos.lecciones.indexLesson')->with(['leccion'=>$leccion, 'curso'=>$leccion->curso, 'num'=>$request->num, 'pivot'=>$registroPivot->pivot]);
            }
            
        }

        

    }

    public function videoEvent($event, Request $request)
    {   
     $leccion = Leccion::find($request->leccion_id);
     $users_lecciones = $leccion->users;

       $flag = 0;  // 0 -> Primera vez del usuario en esta lección.
                   // 1 -> Ya ha estado en esta lección. 

        //Users <--> Leccion
       foreach ($users_lecciones as $user) {
        if(Auth::user()->id == $user->id){
            $flag = 1;
            break;
        }    
    }

        // Agregando en tabla muchos a muchos y en tabla pivot
    if($flag == 0){
        $leccion->users()->attach(Auth::user()->id, array('state' => 'started'));
        Auth::user()->puntos += 10;
        Auth::user()->save();

        Progreso::calcularProgreso($leccion->curso->id,Auth::user()->id);
        return $event.": Primera vez en la lección";
    }
    else{
        if($event == 'videoRunning'){return $event.": Ya ha estado acá";}
        else if($event == 'videoFinished'){

            $registroPivot = $leccion->users()->where([['user_id',Auth::user()->id],['leccion_id',$leccion->id]])->first();

            if($registroPivot->pivot->state == 'started'){
                $registroPivot->pivot->state = 'finished';
                $today = Carbon::today();
                $registroPivot->pivot->fecha_fin = $today;
                $registroPivot->pivot->save();
                Auth::user()->puntos += 20;
                Auth::user()->save();
                Progreso::calcularProgreso($leccion->curso->id,Auth::user()->id);

                return $event.": Se ha completado la leccion."; 
            }
            else{
                return $event.": Ya ha terminado la lección anteriormente.";
            }
        }
    }

}


}

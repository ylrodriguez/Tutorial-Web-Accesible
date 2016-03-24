<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Curso;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CursosController extends Controller
{
    public function __construct(){
        setlocale(LC_TIME,'es');
        Carbon::setlocale('es');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function countCursos(){
        $curso = Curso::find(3);
        $puntajePromedio = 0;
        $response = array();

        foreach ($curso->users as $user ) {
            $puntajePromedio += $user->pivot->progreso;
        }

        $puntajePromedio = $puntajePromedio/count($curso->users);
        $response[] = array('Completado',$puntajePromedio);
        $valorrestante = 100 - $puntajePromedio;   
        $response[] = array('Restante',$valorrestante);

         return json_encode($response);
    }

    public function index()
    {
       $cursos = Curso::orderBy('id','ASC')->paginate(3);
       foreach ($cursos as $curso) {
           $curso->dateCarbon= $curso->created_at->formatLocalized('%d %B %Y');
       }
       
       if (Auth::user()->type == 'admin') {
           return view ('admin.cursos.index')->with('cursos',$cursos);
       } else {
           return view ('member.cursos.index')->with('cursos',$cursos);
       }
       
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curso = new Curso($request->all());

         if($request->file()){
            $file = $request->file('imagen');
            $name = strtolower(str_replace(' ', '', $curso->titulo)).time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/img/courses/';

            $file->move($path, $name);
         }

         $curso->imagen = $name;
         $curso->save();

        Flash::success('¡Se ha creado un nuevo curso!'); 
        return redirect()->route('admin.cursos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::find($id);
        return view ('admin.cursos.edit')->with('curso',$curso);
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
        $curso = Curso::find($id);


        //Si cambio de archivo...
        if($request->file()){
            $path = public_path().'/img/courses/';

            \File::delete($path.$curso->imagen);

            $curso->fill($request->all());

            $file = $request->file('imagen');
            $name = strtolower(str_replace(' ', '', $curso->titulo)).time().'.'.$file->getClientOriginalExtension();
            

            $file->move($path, $name);
            
            $curso->imagen = $name;
            $curso->save();



            Flash::warning('¡Se ha editado el curso de '.$curso->titulo.'!');
            return redirect()->route('admin.cursos.index'); 
        }

        else{

             $curso = Curso::find($id);
             $name = $curso->imagen;

             $curso->fill($request->all());
             $curso->imagen = $name;

             $curso->save();

            Flash::warning('¡Se ha editado el curso de '.$curso->titulo.'!');
            return redirect()->route('admin.cursos.index');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

          $curso = Curso::find($id);
          $curso->delete();

        Flash::error('El curso '.$curso->titulo.' ha sido eliminado de forma exitosa.');
        return redirect()->route('admin.cursos.index');
    }

    public function requestCursos(){
        $cursos = Curso::all();
        $cursos->each(function($cursos){
            $cursos->lecciones;
        });
        return $cursos;
    }
}

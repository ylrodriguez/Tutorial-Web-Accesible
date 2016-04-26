<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use App\Comentario;
use Carbon\Carbon;


class ComentariosController extends Controller
{

    public function __construct(){
        setlocale(LC_TIME,'es');
        Carbon::setlocale('es');
    }

    public function countComentarios(Request $request){
        $comentarios = Comentario::all();

        if($request->evento == 'contar'){return count($comentarios);}

        $response = array();
        foreach ($comentarios as $comentario) {
            //return $comentario->created_at;
            //return gmdate('d.m.Y H:i', strtotime($comentario->created_at));
            if(count($response) == 0){
                 $response[]  = array(strtotime($comentario->created_at)*1000,1);
            }
            else{
                $flag = true;
                for($i=0; $i<count($response); $i++){
                    $fechaArray = date('Y-m-d',$response[$i][0]/1000);
                    $fechaComentario = date('Y-m-d',strtotime($comentario->created_at));
                    if($fechaComentario ==  $fechaArray){
                        $response[$i][1] += 1; 
                        $flag = false;
                        $flag = false;
                    }
                }

                if($flag == true){
                     $response[]  = array(strtotime($comentario->created_at)*1000,1);
                }
            }
        }

          return json_encode($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response  AJAX!
     */ 
    public function show($id)
    {
       //Recoletando la información necesario
       $comentarios = Comentario::where('leccion_id', '=', $id)->orderBy('created_at','DESC')->get();
       foreach ($comentarios as $comentario) {
       		$comentario->user;
            $fecha = $comentario->created_at->diffForHumans();
            $comentario->dateCarbon = $fecha;
       }
       echo json_encode($comentarios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $num = $request->num;
        $slug = $request->slug;
        $leccion_id = $request->leccion_id;

        $comentario = new Comentario($request->all());
        $comentario->user_id = Auth::user()->id;
        $comentario->save();

        if ( Auth::user()->type == 'admin') {
            return redirect()->route('admin.cursos.lecciones.showLesson',['id' => $leccion_id, 'num'=> $num, 'slug'=>$slug]);
        } else {
             return redirect()->route('member.cursos.lecciones.showLesson',['id' => $leccion_id, 'num'=> $num, 'slug'=>$slug]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {

        $comentario = Comentario::find($id);
        $comentario->curso;
        $comentario->delete();

        $leccion_id = $request->leccion_id;

        //Recolectando la información necesario
        $comentarios = Comentario::where('leccion_id', '=', $leccion_id)->orderBy('created_at','DESC')->get();
       foreach ($comentarios as $comentario) {
            $comentario->user;
            $fecha = $comentario->created_at->diffForHumans();
            $comentario->dateCarbon = $fecha;
       }
       return json_encode($comentarios);
    }

}

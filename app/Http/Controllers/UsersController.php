<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use App\Progreso;
use App\Country;
use Carbon\Carbon;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
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

    public function countUsers(){
        $users = User::all();
        return count($users);
    }


    public function index()
    {
        $users = User::orderBy('id','ASC')->paginate(10);

        //Editar código de país a nombre y tipo discapacidad
        foreach ($users as $user) {
             $user->codePais = strtolower($user->pais);
             $user->pais = Country::country_code_to_country($user->pais);
             $user->discapacidad = ucfirst($user->discapacidad);
             $user->discapacidad = $this->tipoDiscapacidad($user->discapacidad);
             $user->dateCarbon= $user->created_at->formatLocalized('%d %B %Y');
        }
        
        return view ('admin.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view ('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->fecha_nac = $request->fecha_nac_birthDay;
        $user->save();
        Flash::success('Se ha registrado '. $user->nombre .' de forma exitosa.');
        return redirect()->route('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user = User::find($id);
         return view('admin.users.edit')->with('user',$user);
    }

    public function showPerfil($slug){

        $user = User::where('slug',$slug)->first();
        
        if(count($user->cursos) == 0){
            //No tiene nada
            $user->codePais = strtolower($user->pais);
            $user->pais = Country::country_code_to_country($user->pais);

            if (Auth::user()->type == "admin") {
               return view ('admin.users.perfil')->with('user',$user);
            } else {
               return view ('member.users.perfil')->with('user',$user);
            }
            
            
        }
        else{ 
            Progreso::calcularProgreso($user->cursos[0]->id,$user->id);
            $user = User::where('slug',$slug)->first();
            $user->codePais = strtolower($user->pais);
            $user->pais = Country::country_code_to_country($user->pais);
            $user->cursos;

            if (Auth::user()->type == "admin") {
               return view ('admin.users.perfil')->with('user',$user);
            } else {
               return view ('member.users.perfil')->with('user',$user);
            }
            
        }
    }

    public function indexConfiguracion()
    {
        
        $user = Auth::user();
        $user->dateCarbon= $user->created_at->formatLocalized('%d %B %Y');
        if ($user->type == "admin") {
           return view('admin.configuracion.index')->with('user',$user);
        } else {
           return view('member.configuracion.index')->with('user',$user);
        }
        
       
    }

    public function updateConfiguracion(UserRequest $request)
    {
        //En vez de $request->id tambien se puede: dd(Input::get('id'));
        $user = User::find($request->id);

        //  S E C T I O N:   M I   D A T O S
        if($request->section == "myInformation"){
            $user->fill($request->all()); //Reemplaza datos de objeto con los nuevos
            $user->fecha_nac = $request->fecha_nac_birthDay;
            $user->save();

            if(Auth::user()->id == $user->id){
                Flash::warning('Tus datos han sido editados de forma exitosa.');

                if ($user->type == "admin") {
                 return redirect()->route('admin.configuracion.index');   
                } else {
                 return redirect()->route('member.configuracion.index');   
                }  
            }
            else{
                Flash::warning('El perfil del usuario ha sido modificado.');
                return redirect()->route('admin.users.edit',['id' => $user->id]);    
            }
        }

        // S E C T I O N:   P A S S W O R D
        if($request->section == "password"){
           
            $user->password = bcrypt($request->newPassword);
            $user->save();

            if(Auth::user()->id == $user->id){
                Flash::warning('La contraseña  ha sido modificada.');

                if ($user->type == "admin") {
                 return redirect()->route('admin.configuracion.index');   
                } else {
                 return redirect()->route('member.configuracion.index');   
                }  

            }
            else{
               
            Flash::warning('La contraseña del usuario ha sido modificada.');
            return redirect()->route('admin.users.edit',['id' => $user->id]);    
            }

        }

        // S E C T I O N:   M A S  I N F O R M A C I O N
        if($request->section == "masInformacion"){
            $user->status = $request->status;
            $user->type = $request->type;

            $user->save();

            
            Flash::warning('El perfil del usuario ha sido modificado.');

            return redirect()->route('admin.users.edit',['id' => $user->id]);
        }

        // S E C T I O N:   I M A G E N  P E R F I L
        if($request->section == "imagenPerfil"){
         
            if($request->file()){
                $path = public_path().'/img/profiles/';
                if($user->imagen != 'default.png'){
                    \File::delete($path.$user->imagen);
                }

                $file = $request->file('imagen');
                $name = strtolower(str_replace(' ', '', $user->username)).time().'.'.$file->getClientOriginalExtension();

                 $file->move($path, $name);

                  $user->imagen = $name;
                  $user->save();

                   if(Auth::user()->id == $user->id){
                       Flash::warning('La imagen de perfil ha sido modificada.');
                       
                        if ($user->type == "admin") {
                        return redirect()->route('admin.configuracion.index');   
                        } else {
                        return redirect()->route('member.configuracion.index');   
                        }  

                   }

                   else{
                       Flash::warning('La imagen de este usuario  ha sido modificada.');
                       return redirect()->route('admin.users.edit',['id' => $user->id]);    
                   }

            }
        }
        
    }

    public function passwordValidacion(Request $request){
        $user = User::find($request->id);
        $response = array();
        if(\Hash::check($request->currentPassword, $user->password)){
            $response += array('estado' => 'true');
            $response += array('comment' => 'comentario');
            echo json_encode($response);
        }
        else{
            $response += array('estado' => "false");
            echo json_encode($response);
        }
    }

//------------------------------------------------------------------------------
    private function tipoDiscapacidad($tipo){
        
        switch ($tipo) {
            case 'None':
                $tipo = 'Ninguna';
                break;
            case 'BajaVision':
                $tipo = 'Baja visión';
                break;
            default:
                break;
        }
        return $tipo;
    }
  
}

@extends('member.template.main')

@section('title','Inicio')

@section('extraSpace')

<div class="row" id="panelPerfil" style="margin: 0.05%; display: block;">
    <div class="col-md-7 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body" style="padding:30px;">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 shadow-border text-center" style="margin-bottom: 10px">
                     <h1>¡Bienvenido de nuevo {{current(explode(' ',Auth::user()->nombre))}}!</h1>
                    </div>

                     <div class="col-md-8">
                        <div class="col-md-12">
                            <h2 class="midsize"> Nombre de usuario: {{Auth::user()->username}}</h2>
                            <h2 class="midsize"> Correo electrónico: {{Auth::user()->email}}</h2>
                        </div>
                     </div>

                    <div class="col-md-4 ">
                        <div class="col-md-12">
                            <div class="circle-avatar-small" style="background-image:url(/img/profiles/{{Auth::user()->imagen}})">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <h3 class="text-center">Puntos: {{Auth::user()->puntos}}</h3>  
                        </div>

                        <div class="col-md-12 text-center no-padding ">

                            <?php 
                            use App\Country;
                            $user = Auth::user();
                            $user->nombrePais = Country::country_code_to_country(Auth::user()->pais);
                            ?>
                            <img style="display: inline; height:31px; width:50px; margin-bottom: 20px;" class="no-margin" src ="/img/countries/country-4x3/{{Auth::user()->pais}}.png" alt="Pais: {{$user->nombrePais}}" title="País: {{$user->nombrePais}}"></img>
                        </div>
                    </div>
                </div>
            <hr/>

            <div class="row">
                <div class="col-md-11 col-md-offset-1">
                    <div class="col-md-12 shadow-border"><h3>Mis cursos</h3></div>

                    @if (count(Auth::user()->cursos) == 0)
                    <div class="col-md-12" style=" margin-top:10px">
                        <p>Aún no ha iniciado ningún curso.</p>
                    </div>

                    @else
                        @foreach (Auth::user()->cursos as $curso)

                        <div class="col-md-12" style=" margin-top:10px">
                            <div class="col-md-3">
                                {{$curso->titulo}}
                            </div>

                            <div class="progress no-padding col-md-5 col-md-offset-1" style="height: 30px;">
                                <div class="progress-bar six-sec-ease-in-out" role="progressbar" data-transitiongoal="{{$curso->pivot->progreso}}">
                                    <span class="sr-only">Completado {{$curso->pivot->progreso}}%</span>
                                    <p style="margin-top: 10px; font-size: 1.3em">{{$curso->pivot->progreso}}%</p>
                                </div>
                            </div>


                        </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-11 col-md-offset-1">
                    <div class="col-md-12 shadow-border"><h3>Mis evaluaciones</h3></div>
                    
                    <?php 
                    $evaluaciones = Auth::user()->evaluaciones;
                    
                    ?>
                    @if(count($evaluaciones) == 0)
                        <p>Aún no ha realizado ninguna evaluación</p>
                    @else
                        @foreach ($evaluaciones as $evaluacion)
                        
                        <div class="col-md-12" style=" margin-top:10px">
                            <div class="col-md-3  shadow-border">
                                {{$evaluacion->descripcion}}
                            </div>

                            <div class="col-md-3 col-md-offset-1">
                                <span>Puntaje: {{round($evaluacion->pivot->puntaje,2)}}</span>
                            </div>
                            <div class="col-md-3 col-md-offset-1">
                                <span>Intentos: {{$evaluacion->pivot->intentos}}</span>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

    <section id="chat">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body" style="background-color: #F1F1F1" >
            <h1 class="text-center" style="margin-top: 0; color:#2C3E50">¡Chat!</h1>
                <!-- BEGIN CBOX - www.cbox.ws - v4.3 -->
                <div id="cboxdiv" style="position: relative; margin: 0 auto; width: 200px; font-size: 0; line-height: 0;">
                    <div style="position: relative; height: 500px; overflow: auto; overflow-y: auto; -webkit-overflow-scrolling: touch; border:#ababab 1px solid;"><iframe src="http://www4.cbox.ws/box/?boxid=4300518&boxtag=15tnwq&sec=main" marginheight="0" marginwidth="0" frameborder="0" width="100%" height="100%" scrolling="auto" allowtransparency="yes" name="cboxmain4-4300518" id="cboxmain4-4300518"></iframe></div>
                    <div style="position: relative; height: 80px; overflow: hidden; border:#ababab 1px solid; border-top: 0px;"><iframe src="http://www4.cbox.ws/box/?boxid=4300518&boxtag=15tnwq&sec=form" marginheight="0" marginwidth="0" frameborder="0" width="100%" height="100%" scrolling="no" allowtransparency="yes" name="cboxform4-4300518" id="cboxform4-4300518"></iframe></div>
                </div>
                <!-- END CBOX -->   
            </div>
        </div>
    </div>
    </section>
</div>

@endsection




{{-- Javascript --}}
@section('js')

<script type="text/javascript">
    $('.progress .progress-bar').progressbar();
</script>

@endsection
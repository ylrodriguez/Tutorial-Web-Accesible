@extends('admin.template.main')

@section('title','Crear nuevo curso')


@section('extraSpace')

  <div class="row" hidden id="panelEdicion">
    <div class="col-md-offset-2 col-md-8">
    <section class="section-admin">
          <div class="panel panel-default">
          <div class="panel-body">
          
            <div class="row">
             <div class="col-md-12">
                    <div class="panel panel-default" style="border: 0px">
                    <div class="panel-body" style="@if (Auth::user()->discapacidad == "daltonismo" || Auth::user()->discapacidad =="ceguera")background-color: #2c3e50; @else background-color: #375A7F; @endif">
                         <div class="col-md-12">
                         <h1 id= "title-course" style="color: white">Nueva leccion</h1>
                         <hr/>
                        <h2 class="midsize" style="color: #d2d2d2">Curso: {{$curso->titulo}}</h2>
                         </div>
                    </div>
                    </div>
            </div>
            </div>

            <div class="row">
             <div class="col-md-12">
                    <div class="panel panel-default" style="border: 0px">
                    <div class="panel-body">
                         <div class="col-md-12">

                        {!! Form::open(['route' =>['admin.cursos.lecciones.store','curso_id' => $curso->id], 'method' => 'POST']) !!}
                        
                        {{-- Nombre --}}
                          <div class="row">
                            <div class="form-group col-md-7">
                            {!! Form::label('titulo','Titulo de la lección') !!}
                            {!! Form::text('titulo',null,['class' => 'form-control', 'placeholder' => 'Ejemplo: Procesadores', 'required' ]) !!}
                            </div>
                          </div>

                          {{-- Descripcion --}}

                          <div class="row">
                            <div class="form-group col-md-7">
                            {!! Form::label('descripcion','Descripción breve de la leccion') !!}
                            {!! Form::textarea('descripcion',null,['size' => '30x5','class' => 'form-control', 'placeholder' => 'Ejemplo: En esta leccion trataremos los conceptos principales de los procesadores.', 'required','maxlength'=>'255', 'minlength'=>'5']) !!}
                            </div>
                          </div>

                          {{-- Teoria --}}

                          <div class="form-group">
                            {!! Form::label('teoria','Contenido y teoria de la leccion') !!}
                            {!! Form::textarea('teoria', null, ['class' => 'form-control ta-content']) !!}
                          </div>



                          {{-- Link --}}
                          <div class="row">
                            <div class="form-group col-sm-8 col-md-8">
                            {!! Form::label('linkvideo','Código del video youtube (embedded)') !!}
                            <div class="input-group">
                                {!! Form::text('linkvideo',null,['class' => 'form-control', 'placeholder' => 'Ejemplo: oAPdNKTrBYA', 'required' ]) !!}
                                <span class="input-group-btn">
                                  <button id="boton-buscar" class="btn btn-default" type="button" onclick="lookUp()" data-container="body" data-toggle="popover" data-placement="right" data-content="" data-trigger="focus" data-animation="true">Buscar video</button>
                                </span>
                            </div>
                            
                            </div>
                            
                          </div>
                          
                          {{-- Video --}}
                           <div class="row">
                           <div class="col-sm-8 col-md-8">
                            <div class="embed-responsive embed-responsive-16by9">
                                <div id="player"></div> 
                            </div>
                            </div>
                           </div>


                          <hr>
                          
                          <div class="form-group">
                            <a href="{{route('admin.cursos.lecciones.show',$curso->id)}}" class="btn btn-warning">
                            <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>  Volver atrás</a>
                            <input id="boton-editar" class="btn btn-primary  pull-right disabled" disabled type="submit" value="Crear lección">
                          </div>
                         {!! Form::close() !!}
                         </div>
                    </div>
                    </div>
            </div>
          </div>

          
          </div>
          </div>
    </section>
    </div>
  </div>

@endsection

{{-- Javascript --}}
@section('js')

    <script>
       $('#panelEdicion').fadeIn(600);

      $("#titulo").keyup(function () {
        var value = "Nueva leccion: " + $(this).val();
        $("#title-course").text(value);
      }).keyup();

      $('.ta-content').trumbowyg({
      lang: 'es'
      });

      $('#boton-buscar').popover();

    </script>

    <script> {{-- Y O U T U B E           A P I --}}
      //<----------------- Mis variables ------------------------------->

      var textoInput = document.getElementById("linkvideo");
      var botonBuscar = document.getElementById("boton-buscar");
      var videoCode = '';

      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          events: {
            'onReady': onPlayerReady,
            'onError': onPlayerError,
            'onStateChange': onPlayerStateChange,
          }
        });
      }

      var done = false; //No carga video al principio.

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        lookUp();
        event.target.playVideo();
      }

      function onPlayerError(event) {
         $("#boton-buscar").attr("data-content","Error cargando video. Por favor, revise el código del video y/o configuraciones y vuelva a intentarlo.");
         $("#boton-buscar").popover("show");
         $("#boton-buscar").attr("data-content","");

          $("#boton-editar").prop("disabled",true);
          $("#boton-editar").addClass( "disabled" );
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.

      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 100);
          done = true;
          $("#boton-buscar").attr("data-content","¡Video cargado!");
          $("#boton-buscar").popover("show");
          $("#boton-buscar").attr("data-content","");

          $("#boton-editar").prop("disabled",false);
          $("#boton-editar").removeClass( "disabled" );

        }
      }

       function stopVideo() {
        player.stopVideo();
      }

     //<----------------- Mis funciones ------------------------------->

      var textoInput = document.getElementById("linkvideo");
      var videoCode = '';

      function lookUp(){
          done = false;
          videoCode = textoInput.value;
          player.loadVideoById(videoCode);
      }

    </script>

@endsection


     

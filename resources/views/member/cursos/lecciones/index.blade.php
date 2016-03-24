@extends('member.template.main')

@section('title','Lista de cursos')


@section('extraSpace')

<div class="row" hidden id="panelLecciones" style="margin: 0.05%">
  <div class="col-md-10 col-md-offset-1">
    <section class="section-member">
      <div class="panel panel-default" style="border-color: #2c3e50">

        {{-- expr --}}
     
        <div class="panel-body"  style=" @if (Auth::user()->discapacidad == "daltonismo" || Auth::user()->discapacidad =="ceguera")background-color: #2c3e50; @else background-color: #375A7F; @endif">

          @include('flash::message') <!-- Para incluir en la plantilla flash -->
          @include('member.template.partials.errors')  <!-- Agregar errores -->

          <div class="jumbotron" style="padding: 4%;border-radius: 0; margin-bottom: 0px;   @if (Auth::user()->discapacidad == "daltonismo" || Auth::user()->discapacidad =="ceguera")background-image:url({{ asset('/img/course-background.jpeg') }} @else background-image:url({{ asset('/img/admin-course-background.jpg') }} @endif">

            <h1>{{$curso->titulo}}</h1>
            <p>{{$curso->descripcion}}</p>
            <hr style=" border-top: 1px solid white;">
            <p style="font-size: 1.2em">Autores del curso: Yojhan Rodriguez y Jeisson Sindicue</p>
            <p style="font-size: 1em">Número de lecciones: 
              <?php // PHP --------
              $numLeccion = 0;
              $totalLecciones = 0;
              foreach ($lecciones as $leccion) {
                $totalLecciones++;
              }
              echo $totalLecciones;
              ?></p>
              <p style="font-size: 1em">Número de usuarios en este curso: {{count($curso->users)}} <span class="glyphicon glyphicon-user"></span></p>
            </div>
            <div class="row">
             <div class="col-md-12" >
              <div class="panel panel-default" style="border-color: #f5f5f5" >
                <div class="panel-body" style="background-color: #FFFFFF" style="border-radius: 0;">
                  @foreach ($lecciones as $leccion)
                  {{-- expr --}}
                         <?php // PHP --------
                         $numLeccion++;
                         ?>

                         <div class="col-md-7 panel-leccion">
                           <div style="padding-left:2%">
                             <h2 style="color: black">{{$numLeccion}}. {{$leccion->titulo}}</h4>
                               <p style="color:black;font-size: 0.9em">{{$leccion->descripcion}}</p>

                             </div>
                           </div>

                           <div class="col-md-4 col-md-offset-1 div-lecciones" style="margin-top: 30px">
                           <a href = "{{ route('member.cursos.lecciones.showLesson',[$leccion->slug, 'id' => $leccion->id, 'num' => $numLeccion]) }}">
                              <div class="panel panel-primary">
                                <div class="panel-heading">
                                  <div class="row">
                                    <div class="col-xs-3">
                                      <i class="glyphicon glyphicon-new-window fa-2x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                      <div style="font-size: 1.2em">Empezar lección</div>
                                    </div>
                                  </div>
                                </div>
                                
                                
                              </div>
                            </a>
                          </div>



                          <div class="col-md-12">
                            <hr style="margin-bottom: 0px; border-top: 1px solid #D4D4D4">
                          </div>

                          @endforeach


                          <div class="leccionNum" hidden ></div>
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
          $('#panelLecciones').fadeIn(600);
          $('.alert').delay(4000).slideUp(1000);

          function modalLeccion(leccion_id){
            $('.leccionNum').text(leccion_id);
            modificaModal();
          }

        </script>


        <style type="text/css">
          .panel-leccion{
            margin:0px;
            background-color:#FFFFFF; 
            padding-left: 1%;
          }
        </style>


        @endsection




@extends('member.template.main')

@section('title','Lista de cursos')


@section('extraSpace')

  <div class="row" hidden id="panelCursos">
    <div class="col-md-offset-2 col-md-8">
    <section class="section-member" >
          <div class="panel panel-default" style="border-radius:1.5em;">
          <div class="panel-body"  style="@if (Auth::user()->discapacidad == "daltonismo" || Auth::user()->discapacidad =="ceguera")background-color: #2c3e50; @else background-color: #375A7F; @endif; border-radius:1.5em;">

          
          <div class="row">
           <div class="col-md-12">
                  <div class="panel panel-default" style="border:0">
                  <div class="panel-body" style="@if (Auth::user()->discapacidad == "daltonismo" || Auth::user()->discapacidad =="ceguera")background-color: #2c3e50; @else background-color: #375A7F; @endif">
                       <div class="col-md-12">
                       <h1 style="color: white">Lista de cursos</h1>
                       
                       </div>
                  </div>
                  </div>
          </div>
          </div>

          
          @include('flash::message') <!-- Para incluir en la plantilla flash -->
          @include('member.template.partials.errors')  <!-- Agregar errores -->

          @foreach ($cursos as $curso)
             <div class="row">
             <div class="col-md-10 col-md-offset-1">
               <div class="panel panel-default panel-cursos" hidden>
               <div class="panel-body" style="border-radius:1em;">
                   <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                   <h2>{{$curso->titulo}}</h1>
                   <p>{{$curso->descripcion}}</p>
                   <hr/>
                   <p>Fecha creación: {{$curso->dateCarbon}}</p>
                   <a href="{{route('member.cursos.lecciones.show',$curso->id)}}" class="btn btn-primary btn-sm" style="font-size: 1em;">
                   Ir al curso</a>
                   </div>

                   <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                     <img src="/img/courses/{{ $curso->imagen }}" class="img-responsive img-rounded" alt="Imagen del curso" style="margin-top: 3%; max-height:150px">
                   </div>
               </div>
               </div>
             </div>
             </div>

          @endforeach
          </div>
          </div>
    </section>
    </div>
  </div>

@endsection

{{-- Javascript --}}
@section('js')

    <script>
      $('#panelCursos').fadeIn(600);
      $('.panel-cursos').slideToggle(1500);
      $('.alert').delay(4000).slideUp(1000);
    </script>


@endsection




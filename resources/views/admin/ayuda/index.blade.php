@extends('admin.template.main')

@section('title','Ayuda')


@section('extraSpace')

  <div class="row" hidden id="panelAyuda">
    <div class="col-md-offset-2 col-md-8">
    <section class="section-admin" >
          <div class="panel panel-default" style="border-radius:1.5em;">
          <div class="panel-body"  style="background-color: #375A7F; border-radius:1.5em;">

          
          <div class="row">
           <div class="col-md-12">
                  <div class="panel panel-default" style="border-color:#375A7F;">
                  <div class="panel-body" style="background-color: #375A7F">
                       <div class="col-md-12">
                       <h1 style="color: white">Manual de usuario</h1>
                       <a href="{{route('admin.cursos.create')}}" class="btn btn-success btn-sm" style="font-size: 1em;">Agregar nuevo curso</a>
                       </div>
                  </div>
                  </div>
          </div>
          </div>

          
          @include('flash::message') <!-- Para incluir en la plantilla flash -->
          @include('admin.template.partials.errors')  <!-- Agregar errores -->

          </div>
          </div>
    </section>
    </div>
  </div>

@endsection

{{-- Javascript --}}
@section('js')

    <script>
      $('#panelAyuda').fadeIn(600);
      $('.panel-cursos').slideToggle(1500);
      $('.alert').delay(4000).slideUp(1000);
    </script>


@endsection




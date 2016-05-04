@extends('admin.template.main')

@section('title','Crear nuevo curso')


@section('extraSpace')

  <div class="row" hidden id="panelEdicion" style="margin: 0.05%; display: block;">
    <div class="col-md-offset-3 col-md-6">
    <section class="section-admin">
          <div class="panel panel-default">
          <div class="panel-body">
          
            <div class="row">
             <div class="col-md-12">
                    <div class="panel panel-default" style="border:0">
                  <div class="panel-body" style="@if (Auth::user()->discapacidad == "daltonismo" || Auth::user()->discapacidad =="ceguera")background-color: #2c3e50; @else background-color: #375A7F; @endif">
                         <div class="col-md-12">
                         <h1 id="title-course" style="color: white">Editar curso: {{$curso->titulo}}</h1>
                         <hr/>
                         </div>

                         <div class="col-md-12">
                           <a href="{{route('admin.cursos.lecciones.show',$curso->id)}}" class="btn btn-success btn-sm" style="font-size: 1em;"><i class="glyphicon glyphicon-plus" aria-hidden="true" ></i> Ver lecciones</a>

                            <a href="{{route('admin.cursos.destroy',$curso->id)}}" class="btn btn-danger btn-sm pull-right" style="font-size: 1em;" onClick="return confirm ('¿Seguro desea eliminar este curso?')">Eliminar curso <i class="glyphicon glyphicon-remove" aria-hidden="true" ></i></a>
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

                         @include('flash::message') <!-- Para incluir en la plantilla flash -->
                         @include('admin.template.partials.errors')  <!-- Agregar errores -->

                        {!! Form::open(['route' =>['admin.cursos.update',$curso,'section' => 'editarCurso'], 'method' => 'PUT', 'files' => true]) !!}
                        
                        {{-- Titulo --}}
                          <div class="row">
                            <div class="form-group col-md-7">
                            {!! Form::label('titulo','Titulo del curso') !!}
                            {!! Form::text('titulo',$curso->titulo,['class' => 'form-control', 'placeholder' => 'Ejemplo: Sistema operativo Android', 'required' ]) !!}
                            </div>
                          </div>

                          <div class="row">
                            <div class="form-group col-md-7">
                            {!! Form::label('descripcion','Descripción breve del curso (max: 255)') !!}
                            {!! Form::textarea('descripcion',$curso->descripcion,['size' => '30x5','class' => 'form-control', 'placeholder' => 'Ejemplo: Curso de los conceptos básicos del popular sistema operativo Android', 'required','pattern' => '.{1,255}','title' => 'Máximo 255 caracteres','data-animation'=>"true",'maxlength'=>'255', 'minlength'=>'5']) !!}
                            </div>
                          </div>

                          <hr>

                          <div class="row">
                            <div class="form-group col-md-6">
                            {!! Form::label('imagen','Imagen') !!}
                            {!! Form::file('imagen',["onchange"=>"showMyImage(this)"]) !!}
                            </div>

                            <div id="panel-imagen" class="col-lg-5 col-md-5 col-sm-5 col-xs-12 pull-right">
                             <img id="img-imagen" src="/img/courses/{{ $curso->imagen }}" class="img-responsive img-rounded" alt="Imagen del curso" style="margin-top: 3%; max-height:150px">
                           </div>
                          </div>

                          <hr>
                          
                          <div class="form-group">
                            <a href="{{ route('admin.cursos.index') }}" class="btn btn-warning">
                            <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>  Volver atrás</a>
                            {!! Form::submit('Editar curso', ['class' => 'btn btn-primary  pull-right']) !!}
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
      $('.alert').delay(8000).slideUp(1000);
      $('#panelEdicion').fadeIn(600);

      $("#titulo").keyup(function () {
        var value = "Editar curso: " + $(this).val();
      $("#title-course").text(value);
      }).keyup();

      {{-- Vista previa de imagen --}}

      function showMyImage(fileInput){
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {           
            var file = files[i];
            var imageType = /image.*/;     
            if (!file.type.match(imageType)) {
                continue;
            }           
            var img=document.getElementById("img-imagen");            
            img.file = file;    
            var reader = new FileReader();
            reader.onload = (function(aImg) { 
                return function(e) { 
                    aImg.src = e.target.result; 
                }; 
            })(img);
            reader.readAsDataURL(file);
        } 
          $('#panel-imagen').hide();
          $('#panel-imagen').show(600);
      }

    </script>


@endsection


<style type="text/css">
body {
  /* Margin bottom by footer height */
  background: url('../img/stardust.png');
  background-repeat:repeat;
}
</style>
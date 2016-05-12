<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h1 class="modal-title midsize" id="myModalLabel"> - </h1>
      </div>

      {{-- Modal - Body --}}
      <div class="modal-body">
        <ul class="nav nav-tabs" style="margin-bottom: 10px">
          <li id="li-descripcion" class="active"><a href="#div-descripcion" data-toggle="tab" aria-expanded="true">Descripción</a></li>
          <li id="li-pregunta" class=""><a href="#div-pregunta" data-toggle="tab" aria-expanded="false">Preguntas</a></li>
        </ul>


        <div id="myTabContent" class="tab-content">

          {{-- Descripcion --}}
          <div class="tab-pane fade active in" id="div-descripcion">

            {!! Form::open(['route' => ['admin.cursos.lecciones.evaluaciones.update','event'], 'method' => 'PUT']) !!}

            {{-- Text area: Descripcion --}}
            <div class="row">                
              <div class="col-md-8 col-md-offset-2">
                <div class="form-group col-md-12">
                  {!!Form::label('descripcion','Máximo 255 caracteres')!!}
                  {!! Form::textarea('descripcion',null,['size' => '30x5','class' => 'form-control', 'placeholder' => 'Ejemplo: En esta prueba se evaluaran los conceptos revisados. Buena suerte.', 'required','maxlength'=>'255', 'minlength'=>'5']) !!}
                </div>
              </div>
            </div>
            <div class="modal-footer">
             <div class="form-group">
               <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

               <input id="boton-descripcion" class="btn btn-primary" type="submit" value="¡Editar evaluación!" disabled>
             </div>
             {!! Form::close() !!}
           </div>

         </div>

         {{-- Preguntas y respuestas --}}
         <div class="tab-pane fade" id="div-pregunta">
          <div class="table-responsive" style="margin-bottom: 10px">
            <div class="col-md-10 col-md-offset-1">
              <table class="table table-striped table-condensed" 
              id="tabla-preguntas"
              data-toggle="table"
              data-url = ""
              data-pagination="true"
              data-page-size="7"
              >
              <thead>
                <th data-field="id">#</th>
                <th data-field="pregunta">Pregunta</th>
                <th data-field="accion">Acción</th>
              </thead>

              <tbody>

              </tbody>
            </table> 
          </div>

        </div>
         <div class="modal-footer">
         {!! Form::open(['route' => ['admin.cursos.lecciones.evaluaciones.preguntas.store'], 'method' => 'POST', 'class' => 'form-ajax']) !!}

         <div class="form-group col-md-7" id='form-pregunta'>
          <label for="pregunta" class="sr-only">Escribe nueva pregunta</label>
          <input type="text" class="form-control" id="pregunta" name="pregunta" placeholder="Nueva pregunta" required="true">
        </div>

        <div class="form-group col-md-5">
          <input id="boton-nuevapregunta" class="btn btn-primary pull-right" type="submit" value="¡Añadir pregunta!">
        </div>
      </div>
        </div>

       

      {!! Form::close() !!}

    </div>
    </div>
    {{-- Cierra Modal - Body --}}



  </div>
</div>
</div>

@include('admin.cursos.lecciones.evaluaciones.opciones.index') 



{{-- ///////////\\\\\\\\\\\\\\\\\\\ --}}
{{-- Script de modificar el modal --}}
<script type="text/javascript">

  $cursoID = "";

  {{-- Modifica modal --}}
  function modificaModal(){

    {{-- Para abrir el tab descripcion --}}
    $('#pregunta').val('');
    $('#div-pregunta').removeClass('active in');
    $('#div-descripcion ').addClass('active in');
    $('#li-pregunta').removeClass('tab-pane active');
    $('#li-descripcion ').addClass('active');

    $('#li-pregunta > a').removeClass('consulted');

    {{-- Varios elementos para reemplazar el modal--}}
    $leccion_id = $('.leccionNum').text();


    {{-- Más cosas necesarias --}}
    $('#myModalLabel').text(' ');
    $('#li-pregunta').hide();
    reset_form('#div-descripcion form');
    $('#div-descripcion form').trigger('reset');
    $('#boton-descripcion').prop("disabled",true);

        //Ajax request
        var dataEnviar = {
          '_token':$('input[name="_token"]').val() 
        };

        $.ajax({
          dataType: 'json',
          data: dataEnviar,
          url:  'http://arqtutorial:8080/admin/cursos/lecciones/evaluaciones/'+$leccion_id,
          type: 'get',
          success:  function (obj) {
            console.log('Cargando modal..');
            console.log(obj);

                //Ya tiene evaluación creada!
                if(obj.flag == true){
                  $('#boton-descripcion').val("¡Editar evaluación!");
                  $('#myModalLabel').text('Evaluación: '+obj.leccion.titulo);
                  $('#li-pregunta').fadeIn(1000);
                  
                  $('#descripcion').text(obj.leccion.evaluaciones[0].descripcion);

                  $url = 'http://arqtutorial:8080/admin/cursos/lecciones/evaluaciones/update';
                  $cursoID =obj.leccion.curso_id;
                  $url += '?curso_id='+obj.leccion.curso_id;
                  $url += '&leccion_id='+obj.leccion.id;
                  $('#div-descripcion form').attr('action',$url);

                  console.log($('#div-descripcion form').attr('action'));
                  $('#boton-descripcion').prop("disabled",false);

                }
                //NO tiene evaluación creada :(
                else{
                  console.log('falso')
                  $('#boton-descripcion').val("¡Crear evaluación!");
                  $('#li-pregunta').hide();
                  $('#myModalLabel').text('Crear evaluación: '+obj.leccion.titulo);

                  $url = 'http://arqtutorial:8080/admin/cursos/lecciones/evaluaciones/create';
                  $url += '?curso_id='+obj.leccion.curso_id;
                  $url += '&leccion_id='+obj.leccion.id;
                  $('#div-descripcion form').attr('action',$url);

                  console.log($('#div-descripcion form').attr('action'));
                  $('#boton-descripcion').prop("disabled",false);
                }

              }

            });
            //Fin ajax

            function reset_form(id) {
              $(id).find("input[type=text] , textarea ").each(function(){
                $(this).text('');            
              });
            }

          }
          {{-- Actualiza tabla cuando hace click en preguntas --}}
          $('#li-pregunta > a').click(function(evt) { 
            console.log('Entro al panel de preguntas');

            if(!$(this).hasClass('consulted')){
              console.log('No se ha consultado.. cargando cursos y lecciones');
              $(this).addClass('consulted');
              {{-- Cambiar de url en el boton de pregunta --}}
              $('#tabla-preguntas').bootstrapTable('refresh', {

               url: 'http://arqtutorial:8080/admin/cursos/lecciones/evaluaciones/preguntas/'+$leccion_id
             });
              completeTable();
            }
          });

          {{-- Guardar pregunta: Envia ajax del formulario de añadir pregunta --}}
          $('form.form-ajax').on('submit',function(event){
            event.preventDefault();

        //Ajax request
        console.log('Guardare nueva pregunta');

        $pregunta = $('#pregunta').val();

        $('#pregunta').val('');//Limpia campo

        var dataEnviar = {
          '_token':$('input[name="_token"]').val(),
          'pregunta':$pregunta,
          'leccion_id':$leccion_id 
        };

        $.ajax({
          data: dataEnviar,
          url: $(this).attr('action'),
          type: 'post',
          success:  function (response) {
            console.log(response);
            $('#tabla-preguntas').bootstrapTable('refresh');

          }
        });

          //Fin ajax
          completeTable();
        });


          {{-- ELimina pregunta --}}
          function eliminarPregunta(e){
            $boolean = confirm ('¿Seguro desea eliminar este comentario?');

            if($boolean == true){
              $pregunta_id = $(e).attr("value");
        //Ajax request
        var dataEnviar = {
          '_token':$('input[name="_token"]').val() 
        };

        $.ajax({
          data: dataEnviar,
          url: 'http://arqtutorial:8080/admin/cursos/lecciones/evaluaciones/preguntas/'+$pregunta_id,
          type: 'delete',
          success:  function (response) {
            console.log(response);
            $('#tabla-preguntas').bootstrapTable('refresh');

          }
        });
            //Fin ajax
            completeTable();
          }
        }

        {{-- Más cosas de la tabla como las opciones de eliminar y añadir opcion --}}
        function completeTable(){

        var done = false; //Variable importante para no repetir peticiones.

          //Espera a que termine de cargar la tabla de BS para mirar que hacer
          $('#tabla-preguntas').on('load-success.bs.table', function () {
            if(!done){
              $table = $('#tabla-preguntas');
              $numero = $('#tabla-preguntas').bootstrapTable('getData').length;
              console.log('Numero de preguntas: '+$numero);

              $preguntas = "";
              var dataEnviar = {
                '_token':$('input[name="_token"]').val() 
              };

              $.ajax({
                dataType: 'json',
                data: dataEnviar,
                cache: false,
                url: 'http://arqtutorial:8080/admin/cursos/lecciones/evaluaciones/preguntas/'+$leccion_id,
                type: 'get',
                success:  function (response) {
                  console.log('> > Respuesta: ');
                  console.log(response);
                  $preguntas = response;

                  for(var i=0; i<$numero; i++){
                   $table.bootstrapTable('updateRow', {
                    index: i,
                    row: {
                      id: (i+1),
                      accion: '<button type="button" alt="Eliminar pregunta" title="Eliminar pregunta" class="btn btn-danger btn-xs" onclick="eliminarPregunta(this)" value="'+$preguntas[i].id+'"><span class="sr-only">Eliminar esta pregunta</span><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button><button type="button" alt="Respuestas" title="Respuestas" class="btn btn-primary btn-xs" onclick="modalOpciones(this.value)" value="'+$preguntas[i].id+'" style="margin-left: 5px" data-toggle="modal" data-target="#myModalopciones"><span class="sr-only">Abrir respuestas para la pregunta</span><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span></button>'
                    }
                  });
                 }
               }
             });
              done = true;
            }
          });
        }


        function getCursoID(){
          console.log('return: '+$cursoID);
          return $cursoID;
        }
      </script>

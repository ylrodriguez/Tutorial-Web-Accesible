

<div class="modal fade" id="myModalopciones" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        {!! Form::open(['route' => ['admin.cursos.lecciones.evaluaciones.preguntas.opciones.store'], 'method' => 'POST', 'class' => 'form-ajaxOpcion']) !!}
            <div class="form-group col-md-7" id='form-pregunta'>
            <label for="inputOpcion" class="sr-only">Escribe nueva respuesta</label>
            <input type="text" class="form-control input-sm" id="inputOpcion" name="inputOpcion" placeholder="Nueva respuesta" required="true">
            </div>
            
            <div class="form-group col-md-5">
              <input id="boton-nuevapregunta" class="btn btn-primary pull-right btn-sm" type="submit" value="¡Añadir respuesta!">
            </div>
        {!! Form::close() !!}
      </div>

      <div class="modal-body">
              

        <div class="table-responsive" style="margin-bottom: 10px">
                <table class="table table-striped table-condensed" 
                id="tabla-opciones"
                data-toggle="table"
                data-url = ""
                >
                <caption hidden>Respuestas</caption>
                <thead>
                  <th data-field="id">#</th>
                  <th data-field="descripcion">Opciones</th>
                  <th data-field="puntaje"data-align="center">*</th>
                  <th data-field="accion" data-align="center">Acción</th>
                </thead>

                <tbody>
    
                </tbody>
                </table> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" id="btnUploadCancel">Cancelar</button>
        <button id="boton-updateOpcion" type="button" class="btn btn-primary btn-sm" onclick="updateOpcion()">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>

{{-- Modal over modal options --}}
<script type="text/javascript">
    $('#btnUploadCancel').click(function(){
        $('#myModalopciones').modal('toggle');
    });
</script>

{{-- Modal options --}}
<script type="text/javascript">
    $pregunta_id = "";

      function modalOpciones(pregunta_id){
       $('#boton-updateOpcion').prop("disabled",true);
       $pregunta_id = pregunta_id;
        console.log("Consultare con la siguiente id: "+$pregunta_id);
        $('#myModalLabelopciones').text('');

        $('#tabla-opciones').bootstrapTable('refresh', {
        url: ' /admin/cursos/lecciones/evaluaciones/preguntas/opciones/'+$pregunta_id
        });
        completeTableopciones();
      }

      {{-- Elimina opcion --}}
      function eliminarRespuesta(e){
        $boolean = confirm ('¿Seguro desea eliminar este comentario?');

        if($boolean == true){
        $opcion_id = $(e).attr("value");
        //Ajax request
        var dataEnviar = {
              '_token':$('input[name="_token"]').val() 
          };
       
        $.ajax({
          data: dataEnviar,
          url: ' /admin/cursos/lecciones/evaluaciones/preguntas/opciones/'+$opcion_id,
          type: 'delete',
          success:  function (response) {
                console.log(response);
                $('#tabla-opciones').bootstrapTable('refresh');
                
              }
            });
            //Fin ajax
            completeTableopciones();
        }
      }

      {{-- Guarda nueva opcion --}}
      $('form.form-ajaxOpcion').on('submit',function(event){
        event.preventDefault();
        
        console.log('Guardare nueva opcion');
        $descripcion = $('#inputOpcion').val();

        $('#inputOpcion').val('');//Limpia campo

        var dataEnviar = {
              '_token':$('input[name="_token"]').val(),
              'descripcion':$descripcion,
              'pregunta_id':$pregunta_id 
          };
        //Ajax request
        $.ajax({
          data: dataEnviar,
          url: $(this).attr('action'),
          type: 'post',
          success:  function (response) {
              console.log(response);
              $('#tabla-opciones').bootstrapTable('refresh');

          }
           });

          //Fin ajax
          completeTableopciones();
      });

      {{-- Identificar cambio del Radio button --}}
      function cambioRadioButton(){
        $('input:radio[name=radioPuntaje]').click(function() {
          console.log('() () Cambio radio button');
          $('#boton-updateOpcion').prop("disabled",false);
        
          //Revisa todos los radios buttons
          $('input:radio[name=radioPuntaje]').each(function() {
              if($(this).prop('checked')){
                $val = $(this).val();
                $("label[for='radio"+$val+"']").text("Correcto");
                $("label[for='radio"+$val+"']").removeClass('text-danger');
                $("label[for='radio"+$val+"']").addClass('text-success');
              }
              else{
                $val = $(this).val();
                $("label[for='radio"+$val+"']").text("Incorrecto");
                $("label[for='radio"+$val+"']").removeClass('text-success');
                $("label[for='radio"+$val+"']").addClass('text-danger');
              }
          });

        });
      }

      function updateOpcion(){
        console.log('Actualizaré opcion');

        $opcion_id = $('input:radio[name=radioPuntaje]:checked').val();
        $leccion_id = $('.leccionNum').text();
        $curso_id = getCursoID();
        var dataEnviar = {
              '_token':$('input[name="_token"]').val(),
              'pregunta_id':$pregunta_id
          };

        //Ajax request
        $.ajax({
          data: dataEnviar,
          url: ' /admin/cursos/lecciones/evaluaciones/preguntas/opciones/'+$opcion_id,
          type: 'put',
          success:  function (response) {
            $url = ' /admin/cursos/lecciones/'+$curso_id;
            location.href = $url;
          }
        });

      }

      {{-- Llenar tabla  --}}
      function completeTableopciones(){
          var done = false; //Variable importante para no repetir peticiones.
          //Espera a que termine de cargar la tabla de BS para mirar que hacer
          $('#tabla-opciones').on('load-success.bs.table', function () {
            if(!done){
            $table = $('#tabla-opciones');
            $numero = $('#tabla-opciones').bootstrapTable('getData').length;
            console.log('Numero de preguntas: '+$numero);

            if($numero == 0){
               $('#boton-updateOpcion').prop("disabled",true);
            }
            

            var dataEnviar = {
              '_token':$('input[name="_token"]').val() 
            };
            
            $.ajax({
              dataType: 'json',
              data: dataEnviar,
              url: ' /admin/cursos/lecciones/evaluaciones/preguntas/opciones/'+$pregunta_id,
              type: 'get',
              success:  function (response) {
              console.log('> > Respuesta Opciones: ');
              console.log(response);
              $opciones = response;

                for(var i=0; i<$numero; i++){
                  $puntaje = "";

                  if($opciones[i].puntaje == "correcto"){
                    $('#boton-updateOpcion').prop("disabled",false);
                    $puntaje = '<input type="radio" name="radioPuntaje" id="radio'+$opciones[i].id+'" checked  value="'+$opciones[i].id+'"/><label for="radio'+$opciones[i].id+'" class="text-success">Correcto</label>';
                  }
                  else{
                     $puntaje = '<input type="radio" name="radioPuntaje" id="radio'+$opciones[i].id+'" value="'+$opciones[i].id+'" required /><label for="radio'+$opciones[i].id+'" class="text-danger">Incorrecto</label>';
                  }

                     $table.bootstrapTable('updateRow', {
                      index: i,
                        row: {
                        id: (i+1),
                        accion: '<button type="button" alt="Eliminar respuesta" title="Eliminar respuesta" class="btn btn-warning btn-xs" onclick="eliminarRespuesta(this)" value="'+$opciones[i].id+'"><span class="sr-only">Eliminar esta respuesta</span><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>',
                        puntaje: $puntaje
                        }
                      });
                }
                cambioRadioButton();
              }
            });
            done = true;
            
            }
          });
      }

</script>

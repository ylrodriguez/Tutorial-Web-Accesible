@extends('admin.template.main')

@section('title',$leccion->titulo)

@section('extraSpace')

<div class="row" hidden id="panelLeccion" style="margin: 0.05%; display: block;">
	<div class="col-md-8" style="padding-right:0.2%; padding-left:0.2%">

		<div class="col-md-12"><h2>{{$num}}. {{$leccion->titulo}}</h2></div>
		<div class="col-md-12">
			<div @if(Auth::user()->discapacidad == 'ceguera') hidden @endif id=panelVideo class="panel panel-default" style="border-color: #375A7F">
				<div class="panel-body">

					<div hidden class="alertmessage col-md-12">
					</div>
					
					<div class="row">
						<div class="col-sm-12 col-md-12">
							<div class="embed-responsive embed-responsive-16by9">
								<div id="player"></div> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div id=panelSecundario class="panel panel-default" style="border-color: #2C3E50">
				<div class="panel-body">
					{{-- Nav-tab --}}
					<ul id="minav" class="nav nav-tabs nav-justified" style="margin-bottom: 10px">
						<li class ="active"><a href="#descripcion" data-toggle="tab" aria-expanded="true">Descripción</a></li>
						<li class =""><a href="#teoria" data-toggle="tab" aria-expanded="false">Teoria</a></li>
						<li class =""><a href="#evaluacion" data-toggle="tab" aria-expanded="false">Evaluación</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in" id="descripcion">
							{{$leccion->descripcion}}
						</div>
						<div class="tab-pane fade" id="teoria">
						</div>
						<div class="tab-pane fade" id="evaluacion">

							<div hidden id="evaluacionPanel" class="col-md-12">
								<div class="col-md-12">
									<span class="green-accesible"style="font-size: 2em;">Puntaje: </span>

									@if (isset($pivot)) {{-- Mirar si existe variable --}}
									<span style="font-size:  1.8em">{{$pivot->puntaje}}</span>
									@else
									<span style="font-size: 1.8em">No se ha realizado la evaluación</span>
									@endif

								</div>

								<div class="col-md-12  shadow-border" style="margin-bottom: 10px">
									<span class="red-accesible" style="font-size: 2em;">Intentos: </span>
									<?php $numIntentos=0; 	?>
									@if (isset($pivot))
									<span style="font-size: 1.8em">{{$pivot->intentos}} </span>
									<span class="black-accesible" style=" font-size: 0.9em">(El número de intentos puede afectar tu puntaje, máximo 5 intentos)</span>
									<?php $numIntentos=$pivot->intentos; ?>
									@else
									<span class="black-accesible" style=" font-size: 0.9em">(El número de intentos puede afectar tu puntaje, máximo 5 intentos)</span>
									@endif
								</div>

								<div class="col-md-8 col-md-offset-2" id="preguntasEvaluacion">
									{{-- Si existe evaluacion en la leccion --}}
									@if(isset($leccion->evaluaciones[0]))
									@if ($numIntentos < 5)
									{{-- expr --}}

									<?php

									$evaluacion = $leccion->evaluaciones[0];
									$preguntas = $evaluacion->preguntas;
									$i = 0;
									?>

									<h3 class="green-accesible">Evaluación: {{$leccion->titulo}}</h3>
									<p>{{$evaluacion->descripcion}}</p>
									<hr/>

									{!! Form::open(['route' => ['admin.cursos.evaluaciones.saveEvaluacion',$evaluacion->id, 'leccion_id' => $leccion->id, 'num' => $num, 'slug' => $leccion->slug], 'method' => 'POST']) !!}

									@foreach ($preguntas as $pregunta)
									<?php $i++;?>
									<div class="col-md-12 shadow-border" style="margin-bottom: 10px"> 
										<fieldset> 
											<legend>{{$i.'. '.$pregunta->pregunta}}</legend>
											<div class="form-group">
												@foreach ($pregunta->opciones as $opcion)
												<div class="col-md-12">
													<input type="radio" name="radioEvaluacion{{$pregunta->id}}" id="radio{{$opcion->id}}" value="{{$opcion->id}}" required/><label for="radio{{$opcion->id}}">{{$opcion->descripcion}}</label>
												</div>
												@endforeach
											</div>
										</fieldset> 
									</div>
									<hr/>	
									@endforeach

									<div class="form-group col-md-12">
										<input id="boton-evaluacion" class="btn btn-primary pull-right btn-sm" type="submit" value="¡Terminar evaluacion!">
									</div>

									{!! Form::close() !!}
									@endif

									@endif



								</div>
							</div>
							
							<div class="col-md-12" id="beforetest">
								<span class="sr-only">Alerta: </span>
								<p>¡Espera un momento! Aún no has terminado la lección. Por favor complétala primero ya sea terminando de ver el video o revisando la teoria.</p>
							</div>

						</div>
					</div>


				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4" style="padding-right:0.9%; padding-left: 0.2%">
		<div class="col-md-12" style="background-color: transparent">	<h2>Comentarios</h2></div>
		<div class="col-md-12">
			<div class="panel panel-default" style="border-color: #2C3E50; max-height: 500px;overflow-y: scroll;">
				<div class="panel-body panel-body-chat" hidden id="panelBody-comentarios"style="@if (Auth::user()->discapacidad == "daltonismo" || Auth::user()->discapacidad =="ceguera")background-color: #ECECEC; @else background-color: #375A7F; @endif; padding-top: 10px; padding-top: 10px; padding-bottom: 10px;">

					
				</div>
			</div>
		</div>

		<div class="col-md-12" >
			

			{!! Form::open(['route' => ['admin.comentarios.store', 'leccion_id' => $leccion->id, 'num' => $num, 'slug' => $leccion->slug ], 'method' => 'POST']) !!}

			<div class="form-group col-md-12 no-padding">
				{!! Form::label('descripcion','¡Añade un comentario! (Max 255 caracteres)') !!}
				{!! Form::textarea('descripcion',null,['size' => '25x5','class' => 'form-control', 'placeholder' => 'Comparte tu opinión', 'required','maxlength'=>'255', 'minlength'=>'5']) !!}

				{!! Form::submit('Añadir comentario', ['class' => 'btn btn-primary btn-sm  pull-right']) !!}

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


<div hidden id="divTest"></div>

@endsection

<?php 
$leccion_user = Auth::user()->lecciones->where('id',$leccion->id)->first();
?>

{{-- Javascript --}}
@section('js')
{{-- Primer script --}}
<script>
	$('#panelLeccion').fadeIn(600);
	$('#panelBody-comentarios').fadeIn(1000);
	$('.alert').delay(8000).slideUp(1000);
	var code ='{{$leccion->teoria}}';

	$('#divTest').append(code);
	$('#teoria').append($('#divTest').text());

	code = '<div class="col-md-12 shadow-border" style="margin: 15px 0px"></div></hr><div class="col-md-12"><button title="Finalizar lección" type="button" onclick="finalizarLeccion(this)" class="btn btn-primary pull-right" style="margin-right: 5px; margin-top: 0; padding-left: 4px;padding-right: 4px;" id="botonFinlec">Finalizar lección <span class="glyphicon glyphicon-saved"></span></button></div>'

	$('#teoria').append(code);



	

	function finalizarLeccion(){
		videoRunORFin('videoFinalizar');
		$('#botonFinlec').prop('disabled',true);
		$('#botonFinlec').text('La lección ya ha sido finalizada');
	}


	//Mostrar panel de Evaluación o no
	@if ($leccion_user != null)
	@if ($leccion_user->pivot->state == "finished")
	$('#beforetest').hide();
	$('#evaluacionPanel').show();
	$('#botonFinlec').prop('disabled',true);
	$('#botonFinlec').text('La lección ya ha sido finalizada');
	@endif
	@endif

</script>

{{-- AJAX script --}}
<script type="text/javascript">
	var dataEnviar = {
		'id': '{{$leccion->id}}',
		'_token':$('input[name="_token"]').val() 
	};

	$.ajax({
		dataType: 'json',
		data: dataEnviar,
		url: '{{ route('admin.comentarios.show',$leccion->id) }}',
		type: 'get',
		success:  function (response) {
			console.log('Agregar los comentarios');
			console.log(response);
			$('#panelBody-comentarios').empty();

			for(var i=0; i<response.length; i++){

				$comentario = response[i].descripcion;
				$username = response[i].user.username;
				$imagen = response[i].user.imagen;
				$coment_id = response[i].id;
				$dateCarbon = response[i].dateCarbon;

				agregarComentario($comentario,$username,$imagen,$coment_id,$dateCarbon);
			}
			$('.nueva-fila').slideToggle(1000);
		}
	});

	function agregarComentario(comentario,username,imagen,coment_id,dateCarbon){
		var toAppend = 
		' <div class="row chat_message relative small-padding nueva-fila" hidden><div class="col-xs-special-1-5 no-padding relative col-xs-2 col-md-1"><div class="box"><a class="right-space" target="_blank" href="http://arqtutorial:8080/admin/perfil/'+username+'"><img height="30" alt="Imagen de perfil"src="/img/profiles/'+imagen+'" style="max-width: 30px"></a></div></div><div class="col-xs-11 no-padding  be-small"><div class="box" style="padding-left:10px"><a target="_blank" href="http://arqtutorial:8080/admin/perfil/'+username+'">'+username+'</a><span>: '+comentario+'</span></div></div></div><div class="row nueva-fila  shadow-border" hidden style="margin-bottom: 10px"><div class="col-xs-8 col-xs-offset-1" ><p class="no-margin blue-accesible be-extrasmall">'+dateCarbon+'<span class="glyphicon glyphicon-time" style="padding-left: 5px;"></span></p></div><div class="col-xs-3" style="padding-right: 2px; margin-bottom:2px"><button title="Eliminar comentario" type="button" onclick="eliminarComentario(this)" value="'+coment_id+'" class="btn  btn-xs pull-right" style="margin-right: 5px; margin-top: 0; padding-left: 4px;padding-right: 4px; background-color: transparent"><span class="sr-only">Eliminar este comentario</span><span class="glyphicon glyphicon-trash"></span></button></div></div>';

		$('#panelBody-comentarios').append(toAppend);

	}

	function eliminarComentario(e){
		$boolean = confirm ('¿Seguro desea eliminar este comentario?');

		if($boolean == true){
			$coment_id = $(e).attr("value");
    		//Ajax request
    		var dataEnviar = {
    			'leccion_id':'{{$leccion->id}}',
    			'_token':$('input[name="_token"]').val() 
    		};

    		$.ajax({
    			dataType: 'json',
    			data: dataEnviar,
    			url: 'http://arqtutorial:8080/admin/comentarios/'+$coment_id+'/destroy',
    			type: 'get',
    			success:  function (response) {
    				console.log(response);
    				$('#panelBody-comentarios').empty();

    				for(var i=0; i<response.length; i++){
    					$comentario = response[i].descripcion;
    					$username = response[i].user.username;
    					$imagen = response[i].user.imagen;
    					$coment_id = response[i].id;
    					$dateCarbon = response[i].dateCarbon;
    					agregarComentario($comentario,$username,$imagen,$coment_id,$dateCarbon);
    				}
    				$('.nueva-fila').slideToggle(1000);

    			},
    			error: function(XMLHttpRequest, textStatus, errorThrown) {
    				console.log("Se presentó algun error: "+errorThrown);
    			}
    		});
            //Fin ajax
        }
    }


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
      	videoCode = '{{$leccion->linkvideo}}';
      	player.loadVideoById(videoCode);
      	stopVideo();
      }

      function onPlayerError(event) {

      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.

      var runningdone = false //Primera vez
      var finisheddone = false //Primera vez
      
      function onPlayerStateChange(event) {
      	if (event.data == YT.PlayerState.PLAYING && !runningdone) {
      		console.log('Primera vez state: PLAYING');
      		runningdone = true;
      		videoRunORFin('videoRunning');
      	}
      	if (event.data == YT.PlayerState.ENDED && !finisheddone) {
      		console.log('Primera vez state: ENDED');
      		finisheddone = true;
      		videoRunORFin('videoFinished');
      	}
      }

      
      function stopVideo() {
      	player.stopVideo();
      }


  </script>


  <script type="text/javascript">
    	function videoRunORFin(evento){ //Video running or finished
    		console.log('Apunto de enviar ajax');
    		var dataEnviar = {
    			'leccion_id':'{{$leccion->id}}',
    			'_token':$('input[name="_token"]').val() 
    		};

    		$.ajax({
    			data: dataEnviar,
    			url: 'http://arqtutorial:8080/admin/cursos/event/'+evento,
    			type: 'get',
    			success:  function (response) {
    				console.log(response);
    				if(evento == "videoFinalizar"){
    					videoRunORFin('videoFinished');
    				}
    				if(evento == "videoFinished"){
    					$('#beforetest').hide();
    					$('#evaluacionPanel').show();

    					var code = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Se ha terminado la leccción correctamente</div>';

    					$('.alertmessage').append(code);
    					$('.alertmessage').show();
    					$('.alert').show();
    					//$('.alert').delay(4000).slideUp(1000);
    				}

    			}
    		});
    	}
    </script>


    @endsection

    
    <style type="text/css">
    	.be-small{font-size:14px !important}
    	.be-extrasmall{font-size:11px !important}
    	.relative{position:relative}
    	.small-padding{padding:1px}
    	.right-space{margin-right:2.5em}.right-space{margin-right:1em}
    	.row .chat_message{
    		margin-left: -10px;
    		margin-right: -10px;
    	}
    	.chat_message{font-size:0.9em}

    	.chat_message:hover .options{display:block}


    	@if (Auth::user()->discapacidad == "daltonismo" || Auth::user()->discapacidad =="ceguera")
    	#minav li a{
    		color: #92413D;
    	}

    	.chat_message a{color:#92413D !important}
    	.green-accesible{
    		color:#227103;
    	}
    	.blue-accesible{
    		color:#1E00FF;
    	}
    	.red-accesible{
    		color:#b30c00;
    	}

    	.black-accesible{
    		color: #000000;
    	}

    	.panelVideo{
    		background-color: #ECECEC;
    	}
    	@else
    	.green-accesible{
    		color:#00bc8c;
    	}
    	.blue-accesible{
    		color:#fffa56;
    	}
    	.red-accesible{
    		color:#e74c3c;
    	}
    	@endif

    </style>
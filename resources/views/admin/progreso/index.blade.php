@extends('admin.template.main')

@section('title','Progreso')

@section('extraSpace')

<div class="row" id="panelPerfil" style="margin: 0.05%; display: block;">
	<div class="col-md-12 no-padding">
		<div class="panel panel-default">
			<div class="panel-body" style="padding:30px;">
				<div class="row">
					<div class="col-md-4 ">
						<div class="col-md-8 col-md-offset-2">
							<div class="circle-avatar" style="background-image:url(/img/profiles/{{$user->imagen}})">
							</div>

						</div>

						<div class="col-md-12 text-center no-padding ">
							
							<img class="center-block" style="display: inline; height:31px; width:50px; margin-top: 20px;" src ="/img/countries/country-4x3/{{$user->codePais}}.png" alt="Pais: {{$user->pais}}" title="País: {{$user->pais}}"></img>
						</div>
						<div class="col-md-12 text-center no-padding ">
							<p style="font-weight: bold">{{$user->pais}}</p>
						</div>
					</div>

					<div class="col-md-7 col-md-offset-1">
						
						<div class="col-md-12" style="margin-bottom: 15px">
							<h1 class="extra-huge">Mi progreso</h1>
							<span style="font-weight: bold">Nombre: </span>
							<span> {{$user->nombre}} ({{$user->username}})</span>
							
						</div>

						<div class="col-md-12" style="margin-bottom: 15px">
							<span style="font-weight: bold">Tipo de usuario: </span>
							@if($user->type == "admin")
							<span class="label label-danger" alt="Tipo de usuario: Administrador" style="font-size: 0.9em">Administrador</span>
							@endif

							@if($user->type == "member")
							<span class="label label-primary" alt="Tipo de usuario: Miembro" style="font-size: 0.9em">Miembro</span>
							@endif

							
						</div>
						
						<div class="col-md-12" style="margin-bottom: 15px">
							<span style="font-weight: bold">Fecha de ingreso: </span>
							<span> {{$user->dateCarbon}}</span>
						</div>

						<div class="col-md-12" style="margin-bottom: 15px">
							<span style="font-weight: bold">Número de dias en el tutorial: </span>
							<span> {{$user->diasTutorial}}</span>
						</div>



						<div class="col-md-12">
							<h2>Total de puntos: {{$user->puntos}}</h2>	
						</div>
					</div>
				</div>
				<hr/>

				<div class="row">
					<div class="col-md-11 col-md-offset-1">
						<div class="col-md-12 shadow-border"><h3>Mis cursos</h3></div>

						@if (count($user->cursos) == 0)
						<div class="col-md-12" style=" margin-top:10px">
							<p>Aún no ha iniciado ningún curso.</p>
						</div>



						@else
						{{-- false expr --}}
						@foreach ($user->cursos as $curso)

						<div class="col-md-12" style=" margin-top:10px">
							<div class="col-md-3">
								{{$curso->titulo}}
							</div>
							<div class="col-md-9">
								<span class="sr-only">Completado {{$curso->pivot->progreso}}%</span>
								<div class="progress no-padding">
									<div class="progress-bar six-sec-ease-in-out" role="progressbar" data-transitiongoal="{{$curso->pivot->progreso}}" aria-hidden="true">
									</div>
								</div>
							</div>
						</div>
						@endforeach
						@endif
						

						<div class="col-md-12 shadow-border"><h3>Mis lecciones</h3></div>
						@if (count($user->lecciones) == 0)
						<div class="col-md-12" style=" margin-top:10px">
							<p>Aún no has iniciado ninguna leeción.</p>
						</div>



						@else
						{{-- false expr --}}
						@foreach ($user->lecciones as $leccion)

						<div class="col-md-12" style=" margin-top:10px">
							<div class="col-md-3">
								{{$leccion->titulo}}
							</div>

							<div class="col-md-5 col-md-offset-2" style="height: 30px;">
								@if ($leccion->pivot->state == 'started')
								{{-- true expr --}}
								<h3 class="midsize no-margin" style="margin-bottom:10px"><span class="label label-danger" alt="Lección iniciada">Lección iniciada<span class="glyphicon glyphicon-remove"></span></span></h3>
								@endif

								@if ($leccion->pivot->state == 'finished')
								{{-- false expr --}}
								<h3 class="midsize no-margin" style="margin-bottom:10px"><span class="label label-success" alt="Lección finalizada">Lección finalizada <span class="glyphicon glyphicon-ok"></span></span></h3>
								@endif 
							</div>
						</div>
						@endforeach
						
						<div class="col-md-12">
							<div class="col-md-5 col-md-offset-3">
								<div id="container" style="width:120%; height:380px;"></div>
							</div>
						</div>

						@endif


						<div class="col-md-12 shadow-border"><h3>Mis evaluaciones</h3></div>
						@if (count($user->evaluaciones) == 0)
						<div class="col-md-12" style=" margin-top:10px">
							<p>Aún no has realizado ninguna evaluación.</p>
						</div>



						@else
						{{-- false expr --}}
						@foreach ($user->evaluaciones as $evaluacion)

						<div class="col-md-12" style=" margin-top:20px">
							<div class="col-md-4 shadow-border">
								{{$evaluacion->descripcion}}
							</div>
							<div class="col-md-3 col-md-offset-1">
								@if (round($evaluacion->pivot->puntaje,2) > 80)
								<h3 class="midsize no-margin"><span class="label label-success">Puntaje: {{round($evaluacion->pivot->puntaje,2)}}</span></h3>
								@else
								<h3 class="midsize no-margin"><span class="label label-danger">Puntaje: {{round($evaluacion->pivot->puntaje,2)}}</span></h3>
								@endif
								
							</div>
							<div class="col-md-3 col-md-offset-1">

								@if ($evaluacion->pivot->intentos > 3)
								<h3 class="midsize no-margin"><span class="label label-danger">Intentos: {{$evaluacion->pivot->intentos}}</span></h3>
								@else
								<h3 class="midsize no-margin"><span class="label label-success">Intentos: {{$evaluacion->pivot->intentos}}</span></h3>
								@endif

								
							</div>

						</div>
						@endforeach

						<div class="col-md-12">
							<div class="col-md-5 col-md-offset-3">
								<div id="container2" style="width:120%; height:380px;"></div>
							</div>
						</div>

						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

{{-- Javascript --}}
@section('js')

@if (Auth::user()->discapacidad != "daltonismo" && Auth::user()->discapacidad !="ceguera")
<script src="{{ asset('plugins/highcharts/highchartsDark.js') }}"></script>
@endif


<script type="text/javascript">
	$('.progress .progress-bar').progressbar({display_text: 'fill'});
</script>

<script type="text/javascript">
	    //Leccion progreso
	    $.ajax({
	    	dataType: 'json',
	    	url: '{{ route('admin.progreso.leccionProgreso') }}',
	    	type: 'get',
	    	success:  function (response) {
	    		console.log(response);
	    		chartLeccion(response);
	    	}
	    });

	    function chartLeccion(data){
	    	$('#container').highcharts({
	    		chart: {
	    			plotBackgroundColor: null,
	    			plotBorderWidth: 0,
	    			plotShadow: false
	    		},
	    		title: {
	    			text: '<strong>'+data[0][1]+'</strong><br><strong>Lecciones</strong><br>iniciadas<br> completadas',
	    			align: 'center',
	    			verticalAlign: 'middle',
	    			y: 40
	    		},
	    		tooltip: {
	    			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	    		},
	    		plotOptions: {
	    			pie: {
	    				dataLabels: {
	    					enabled: true,
	    					distance: -50,
	    					style: {
	    						fontWeight: 'bold',
	    						color: 'white',
	    						textShadow: '0px 1px 2px black'
	    					}
	    				},
	    				startAngle: -90,
	    				endAngle: 90,
	    				center: ['50%', '75%']
	    			}
	    		},
	    		series: [{
	    			type: 'pie',
	    			name: 'Progreso',
	    			innerSize: '50%',
	    			data: data
	    		}]
	    	});
	    }

        //Evaluación aprobada
        $.ajax({
        	dataType: 'json',
        	url: '{{ route('admin.progreso.evaluacionProgreso') }}',
        	type: 'get',
        	success:  function (response) {
        		console.log(response);
        		chartEvaluacion(response);
        	}
        });

        function chartEvaluacion(data){
        	$('#container2').highcharts({
        		chart: {
        			plotBackgroundColor: null,
        			plotBorderWidth: 0,
        			plotShadow: false
        		},
        		title: {
        			text: '<strong>'+data[0][1]+'</strong><br><strong>Evaluaciones</strong><br>aprobadas<br>',
        			align: 'center',
        			verticalAlign: 'middle',
        			y: 40
        		},
        		tooltip: {
        			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        		},
        		plotOptions: {
        			pie: {
        				dataLabels: {
        					enabled: true,
        					distance: -50,
        					style: {
        						fontWeight: 'bold',
        						color: 'white',
        						textShadow: '0px 1px 2px black'
        					}
        				},
        				startAngle: -90,
        				endAngle: 90,
        				center: ['50%', '75%']
        			}
        		},
        		series: [{
        			type: 'pie',
        			name: 'Progreso',
        			innerSize: '50%',
        			data: data
        		}]
        	});
        }
    </script>

    @endsection
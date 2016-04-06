@extends('member.template.main')

@section('title','Mi perfil')

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
					</div>

					<div class="col-md-8">
						<div class="col-md-12">
							<span class="extra-huge">{{$user->nombre}}</span>
							<span> ({{$user->username}})</span>
							<img style="display: inline; height:31px; width:50px; margin-bottom: 20px;margin-left: 30px;" src ="/img/countries/country-4x3/{{$user->codePais}}.png" alt="Pais: {{$user->pais}}" title="País: {{$user->pais}}"></img>
						</div>

						<div class="col-md-12" style="margin-bottom: 15px">
							@if($user->type == "admin")
							<span class="label label-danger" alt="Tipo de usuario: Administrador" style="font-size: 0.9em">Administrador</span>
							@endif

							@if($user->type == "member")
							<span class="label label-primary" alt="Tipo de usuario: Miembro" style="font-size: 0.9em">Miembro</span>
							@endif
						</div>


						<div class="col-md-12">
							@if ($user->biografia == "")
							<p>No hay biografia disponible.</p>
							@else
							<p class="text-justify">{{$user->biografia}}</p>
							@endif

						</div>

						<div class="col-md-12">
							<h2>Puntos: {{$user->puntos}}</h2>	
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
								<div class="progress">
									<div class="progress-bar six-sec-ease-in-out" role="progressbar" data-transitiongoal="{{$curso->pivot->progreso}}">
									</div>
								</div>
							</div>
						</div>
						@endforeach
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

<script type="text/javascript">
	$('.progress .progress-bar').progressbar({display_text: 'fill'});
</script>

@endsection
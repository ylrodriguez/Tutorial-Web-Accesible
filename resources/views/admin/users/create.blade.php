<!-- Usar plantilla main -->
@extends('admin.template.main')

<!-- Editar Yield llamado title de la plantialla -->
@section('title','Crear nuevo usuario') 

@section('content')
	
	@section('class-panel','col-md-offset-3 col-md-6')

	@section('panel-title','Crear nuevo usuario')
	

	<div class="row">

		{{-- {{{{{{{{{{{ Paneles }}}}}}}}}}}}}} --}}

		{{-- Panel de Mi perfil --}}

		<div class="col-md-12" >
			<div class="panel panel-default panelesPerfil currentOpen" id="panel-misDatos">
				  <div class="panel-body">
				    <h1>Datos del usuario</h1>
				    <p>Ingresa los datos principales del nuevo usuario.</p>
				    <hr/> 

				    @include('flash::message') <!-- Para incluir en la plantilla flash -->
			    	@include('admin.template.partials.errors')	<!-- Agregar errores -->

						
						{!! Form::open(['route' =>'admin.users.store', 'method' => 'POST']) !!}

						{{-- Nombre --}}
						<div class="row">
							<div class="form-group col-md-7">
							{!! Form::label('nombre','Nombre') !!}
							{!! Form::text('nombre',null,['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required' ]) !!}
							</div>
						</div>
						
						{{-- Username --}}
						<div class="row">
							<div class="form-group col-md-7">
							{!! Form::label('username','Nombre de usuario') !!}
							{!! Form::text('username',null,['class' => 'form-control', 'placeholder' => 'Nombre usuario', 'required' ]) !!}
							</div>
						</div>

						{{-- Password --}}
						<div class="row">
							<div class="form-group col-md-7">
							{!! Form::label('password','Contraseña') !!}
							{!! Form::password('password',['class' => 'form-control', 'placeholder' => 'Digite contraseña', 'required' ]) !!}
							</div>
						</div>

						{{-- Correo --}}
						<div class="row">
						<div class="form-group col-md-7">
						{!! Form::label('email','Correo electrónico') !!}
						{!! Form::email('email',null,['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required' ]) !!}
						</div>
						</div>

						{{-- Discapacidad --}}
						<div class="row">
						<div class="form-group col-md-7">
						{!! Form::label('discapacidad', 'Discapacidad') !!}
						{!! Form::select('discapacidad', ['none' => 'Ninguna','ceguera' => 'Ceguera','daltonismo' => 'Daltonismo', 'bajaVision' => 'Baja visión' , 'sordera' => 'Sordera', 'otra' => 'Otra'], 'Ninguna',['class' => 'form-control', 'required']) !!}
						</div>
						</div>

						{{-- Pais --}}
						<div class="row">
							<div class="form-group col-md-7">
							<label for="pais">País</label>
							@include('admin.template.partials.countries')
							</div>
						</div>

						{{-- Fecha nacimiento --}}
							<div class ="form-group">
								<div id ="fecha_nac"></div>
							</div>


						{{-- Tipo --}}
						<div class="row">
							<div class="form-group col-md-7">
							{!! Form::label('type', 'Tipo de usuario') !!}
							{!! Form::select('type', ['admin' => 'Administrador','member' => 'Miembro'], 'member',['class' => 'form-control', 'required']) !!}
							</div>
						</div>

						<hr/>
						<div class="form-group">
							{!! Form::submit('Crear usuario', ['class' => 'btn btn-primary  pull-right']) !!}
						</div>

						{!! Form::close() !!}

				  </div>
			</div>
			



{{-- /////////////////////////////////////////////////////////////////////////////////// --}}


	{{-- Javascript --}}
	@section('js')
		{{-- expr --}}
		<script type ="text/javascript">
			$(document).ready(function(){
				$("#panelPretederminado").show();
				$(".panelesPerfil").hide();

				$("#fecha_nac").birthdayPicker();
				
				//Paneles
				var $currentItem = $('.currentOpen');
				$currentItem.fadeIn(700);
			    

				$(".botonesPerfil").click(function(){
					$currentItem.hide();
					$currentItem.removeClass('.currentOpen');

					// var $name = "panel-"+this.id;
					// $('#prueba').text($name);


					$currentItem = $('#panel-'+this.id);
					$currentItem.fadeIn(700);

					$currentItem.addClass('.currentOpen');

				});

				$("#div3").width($("#div3").width() + 8);  
			});		
		</script>

		<script type="text/javascript">
			$('.alert').delay(8000).slideUp(1000);
		</script>

	

	@endsection

	

@endsection

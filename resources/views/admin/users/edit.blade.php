<!-- Usar plantilla main -->
@extends('admin.template.main')

<!-- Editar Yield llamado title de la plantialla -->
@section('title','Editar usuario: ' . $user->nombre) 

@section('content')
	
	@section('class-panel','col-md-offset-2 col-md-8')

	@section('panel-title','Editar usuario: ' . $user->nombre)
	

	<div class="row">

		{{-- Butones --}}
		<div class="col-md-3">

			 <div class="col-md-12 no-padding" style="height:180px; margin-bottom: 2em">
				<div id="panel-imagen" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding" style="height: 100%">
				<a id="imagenThumbnail" class="thumbnail"><img id="img-imagen" src="/img/profiles/{{ $user->imagen }}" class="img-responsive img-rounded" alt="Imagen de perfil" onerror="imgError(this);">
				</div></a>
			  </div>

			  <div class=btn-group-vertical role=group aria-label="Vertical button group" style="width: 100%">
				  <button type=button class="btn btn-default botonesPerfil" id="misDatos">Datos básicos</button>
				  <button type=button class="btn btn-default botonesPerfil" id="contraseña">Contraseña</button>
				  <button type=button class="btn btn-default botonesPerfil" id="masInformacion">Más opciones</button>
				  <button type=button class="btn btn-default botonesPerfil" id="imagenPerfil">Imagen de perfil</button>
			  </div>
		</div>

		{{-- {{{{{{{{{{{ Paneles }}}}}}}}}}}}}} --}}

		

		<div class="col-md-9" >

			{{--/////////////////////// Datos básicos  \\\\\\\\\\\\\\\\\\\\\--}}

			<div class="panel panel-default panelesPerfil currentOpen" id="panel-misDatos">
				  <div class="panel-body">
				    <h2>Datos básicos</h2>
				    <p>Consulta y cambia los datos principales de este usuario.</p>
				    <hr/> 

				    @include('flash::message') <!-- Para incluir en la plantilla flash -->
			    	@include('admin.template.partials.errors')	<!-- Agregar errores -->

						
						{!! Form::open(['route' => ['admin.configuracion.update', 'id' => $user->id,'section' => 'myInformation'], 'method' => 'PUT']) !!}

						{{-- Nombre --}}
						<div class="row">
							<div class="form-group col-md-7">
							{!! Form::label('nombre','Nombre completo') !!}
							{!! Form::text('nombre',$user->nombre,['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required' ]) !!}
							</div>
						</div>
						
						{{-- Username --}}
						<div class="row">
							<div class="form-group col-md-7">
							{!! Form::label('username','Nombre de usuario') !!}
							{!! Form::text('username',$user->username,['class' => 'form-control', 'placeholder' => 'Nombre de usuario', 'required' ]) !!}
							</div>
						</div>

						{{-- Correo --}}
						<div class="row">
						<div class="form-group col-md-7">
						{!! Form::label('email','Correo electrónico') !!}
						{!! Form::email('email',$user->email,['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required' ]) !!}
						</div>
						</div>

						{{-- Discapacidad --}}
						<div class="row">
						<div class="form-group col-md-7">
						{!! Form::label('discapacidad', 'Discapacidad') !!}
						{!! Form::select('discapacidad', ['none' => 'Ninguna','ceguera' => 'Ceguera','daltonismo' => 'Daltonismo', 'bajaVision' => 'Baja visión' , 'sordera' => 'Sordera', 'otra' => 'Otra'], $user->discapacidad,['class' => 'form-control', 'required']) !!}
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

						{{-- Biografia --}}
						<div class="row">
							<div class="form-group col-md-8">
							{!! Form::label('biografia','Mi biografia') !!}
							{!! Form::textarea('biografia',$user->biografia,['class' => 'form-control', 'placeholder' => 'Mi nombre es Juan y me gusta saber sobre la tecnologia.','pattern' => '.{1,255}','title' => 'Máximo 255 caracteres','maxlength'=>'255', 'minlength'=>'5']) !!}
							</div>
						</div>


						<hr/>
						<div class="form-group">
							<a href="http://arqtutorial:8080/admin/users" class="btn btn-warning">
                            <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>  Volver atrás</a>

							{!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary  pull-right']) !!}
						</div>

						{!! Form::close() !!}

				  </div>
			</div>
			
			{{--/////////////////////// Contraseña  \\\\\\\\\\\\\\\\\\\\\--}}
			<div class="panel panel-default panelesPerfil" id="panel-contraseña">
				  <div class="panel-body" style="height:45em">
				   <h3>Contraseña</h2>
				    <p>Edita contraseña del usuario.</p>
				    <hr/> 

					@include('flash::message') <!-- Para incluir en la plantilla flash -->
			    	@include('admin.template.partials.errors')	<!-- Agregar errores -->

					{!! Form::open(['route' => ['admin.configuracion.update', 'id' => $user->id, 'section' => 'password'], 'method' => 'PUT']) !!}

					
					{{-- Contraseña nueva --}}
						<div class="row">
						<div class="form-group col-md-7">
						{!! Form::label('newPassword','Contraseña nueva') !!}
						{!! Form::password('newPassword', ['class' => 'form-control', 'placeholder' => '***********', 'required', 'data-container'=> 'body', 'data-toggle'=> "popover", 'data-placement'=> "right", 'data-content'=>"", 'data-trigger'=> "focus", 'data-animation'=>"true",'pattern'=>'.{8,}']) !!}
						</div>
						</div>

					{{-- Confirma contraseña --}}
						<div class="row">
						<div class="form-group col-md-7">
						{!! Form::label('confirmPassword','Confirma contraseña') !!}
						{!! Form::password('confirmPassword', ['class' => 'form-control', 'placeholder' => '***********', 'required','pattern'=>'.{8,}']) !!}
						</div>
						</div>
						
						<hr/>
						<div class="form-group">
							 <input id="boton-contraseña" class="btn btn-primary  pull-right" disabled type="submit" value="Guardar cambios">
						</div>

					{!! Form::close() !!}

				  </div>
			</div>
			
			{{--/////////////////////// Más opciones  \\\\\\\\\\\\\\\\\\\\\--}}
			<div class="panel panel-default panelesPerfil" id="panel-masInformacion">
				  <div class="panel-body">
				    <h3>Más opciones</h2>
				    <p>Encuentra opciones más avanzadas para este usuario.</p>
				    <hr/>
				    {!! Form::open(['route' => ['admin.configuracion.update', 'id' => $user->id,'section' => 'masInformacion'], 'method' => 'PUT']) !!}
						
						{{-- Estado usuario --}}
						<div class="row">
							<div class="form-group col-md-7">
							@if ($user->status == "activated")
							{!! Form::label('status', 'Estado del usuario'); !!}
								<span id="label-status" class="btn-success btn-xs glyphicon glyphicon-ok"></span>
							@else
								{!! Form::label('status', 'Estado del usuario'); !!}
								<span class="btn-danger btn-xs glyphicon glyphicon-remove" id="label-status" ></span>
								
							@endif
							
							{!! Form::select('status', ['activated' => 'Activo','deactivated' => 'No activo'], $user->status,['class' => 'form-control', 'required']) !!}
							</div>
						</div>

						{{-- Fecha registro --}}
				     	<div class="row">
							<div class="form-group col-md-7">
							{!! Form::label('created_at','Fecha de registro:') !!}
							{!! Form::text('created_at',$user->created_at,['class' => 'form-control', 'disabled']) !!}
							</div>
						</div>

						{{-- Tipo --}}
						<div class="row">
							<div class="form-group col-md-7">
							@if ($user->type == "admin")
								{!! Form::label('type', 'Tipo de usuario:'); !!}
								<span id="span-type"class="label label-danger" alt="administrador">Admin</span>
							@else
								{!! Form::label('type', 'Tipo de usuario:'); !!}
								<span id="span-type"class="label label-primary" alt="miembro">Miembro</span>
							@endif

							{!! Form::select('type', ['admin' => 'Administrador','member' => 'Miembro'], $user->type,['class' => 'form-control', 'required']) !!}
							</div>
						</div>
						


						 <hr/>

						<div class="form-group">
							{!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary  pull-right']) !!}
						</div>

						{!! Form::close() !!}

				  </div>
			</div>

			{{--/////////////////////// Imagen Perfil  \\\\\\\\\\\\\\\\\\\\\--}}
			<div class="panel panel-default panelesPerfil" id="panel-imagenPerfil">
				  <div class="panel-body" style="height:28em">
				    <h3>Imagen de perfil</h2>
				    <p>Cambia imagen de perfil del usuario.</p>
				    <hr/>

				    {!! Form::open(['route' => ['admin.configuracion.update', 'id' => $user->id,'section' => 'imagenPerfil'], 'method' => 'PUT','files' => true]) !!}
						
						<div class="row">
                            <div class="form-group col-md-6">
                            {!! Form::label('imagen','Selecciona una imagen') !!}
                            {!! Form::file('imagen',["onchange"=>"showMyImage(this)"]) !!}
                            </div>
                         </div>
						
						<hr/>
						<div class="form-group">
							 <input id="boton-imagen" class="btn btn-primary  pull-right" disabled type="submit" value="Cambiar imagen">
						</div>

						{!! Form::close() !!}

				  </div>
			</div>



{{-- /////////////////////////////////////////////////////////////////////////////////// --}}


	{{-- Javascript --}}
	@section('js')
		{{-- Principal--}}
		<script type ="text/javascript">
			$(document).ready(function(){
				$('#newPassword').popover();
				$("#panelPretederminado").show();
				$(".panelesPerfil").hide();

				$('.alert').delay(8000).slideUp(1200);
				//Cambia el país en el checkbox
				$('#pais').val('{{$user->pais}}');

				//Datetimepicker configuracion DatetimePicker
				var  $fechaOriginal = '{{$user->fecha_nac}}';
				var  $fechaEditada =  $fechaOriginal.replace('-','/');
				$("#fecha_nac").birthdayPicker({"defaultDate":$fechaEditada});  
				
				//Paneles
				var $currentItem = $('.currentOpen');
				$currentItem.fadeIn(700);
			    

				$(".botonesPerfil").click(function(){
					console.log('Aca');
					cambiaPaneles(this.id);
				});

				$("#imagenThumbnail").click(function(){
					console.log('Aca');
					cambiaPaneles('imagenPerfil');
				});

				

				{{-- Cambia los paneles --}}
				function cambiaPaneles($selector){
					console.log($selector);
					$currentItem.hide();
					$currentItem.removeClass('.currentOpen');

					$currentItem = $('#panel-'+$selector);
					$currentItem.fadeIn(700);

					$currentItem.addClass('.currentOpen');
				};

				$("#div3").width($("#div3").width() + 8);  
			});		
		</script>

		{{-- Cambia color tipo de usuario/estado --}}
		<script type="text/javascript">
			$("select[name=status]").change(function(){
				if ($(this).val() == "activated") {
				    cambiaEstados('#label-status','btn-success btn-xs glyphicon glyphicon-ok');
				} else {
					 cambiaEstados('#label-status','btn-danger btn-xs glyphicon glyphicon-remove');
				}
			});

			$("select[name=type]").change(function(){
				if ($(this).val() == "admin") {
					cambiaEstados('#span-type',"label label-danger");
					$('#span-type').text('Administrador');
					
				} else {
					cambiaEstados('#span-type',"label label-primary");
					$('#span-type').text('Miembro');
				}
			});


			function cambiaEstados(control, clase){
				$(control).removeClass();
				$(control).addClass(clase);
			}

		</script>
	
		{{-- Esperar a que termine de escribir --}}
		<script type="text/javascript">
			var $confirmPassword = $('#confirmPassword');
			var $newPassword = $('#newPassword');

			var delay = (function(){
			var timer = 0;
			

			return function(callback, ms){
			clearTimeout (timer);
			timer = setTimeout(callback, ms);
			};
			})();

			$('#confirmPassword').keyup(function() {
			delay(function(){
				if (confirmPassword.value == newPassword.value) {
					$('#boton-contraseña').prop("disabled",false);
					$("#newPassword").popover("hide");
				} else {
					$('#boton-contraseña').prop("disabled",true);
					$("#newPassword").attr("data-content","Las contraseñas no coinciden.");
			         $("#newPassword").popover("show");
			         $("#newPassword").attr("data-content","");
				}
			}, 1000 );
			});

		</script>
		
		{{-- Vista previa de imagen --}}
		<script type="text/javascript">
		  function imgError(image) {
		    image.onerror = "";
		    image.src = "/img/profiles/default.png";
		    return true; 
		  }

	      function showMyImage(fileInput){
	      	console.log('Cambiaré imagen');
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
	          $('#boton-imagen').prop("disabled",false);
	      }
		</script>

	

	@endsection

	<style type="text/css">

	 .thumbnail {
        height: 100%;
        background-color: white;
    }

    .thumbnail img {
      height: 100%
    }
</style>

@endsection
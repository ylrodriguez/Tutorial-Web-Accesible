@if(count($errors) > 0) <!-- Saber si tiene errores que vengan -->
		<div class="alert alert-danger" role="alert">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	@endif

	{{-- Directamente conectado con los Request creados, Ejemplo: UserRequest, ComentarioRequest --}}
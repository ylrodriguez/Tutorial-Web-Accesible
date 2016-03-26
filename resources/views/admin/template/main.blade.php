<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title', 'Default') | Administración </title>
	
	@if (Auth::user()->discapacidad == "daltonismo" || Auth::user()->discapacidad =="ceguera")
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap-flatly.css') }}">
	@else
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap-darkly.css') }}">
	@endif

	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap-accessibility.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-table/dist/bootstrap-table.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/chosen/chosen.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/font-awesome-4.5.0/css/font-awesome.css') }}">

	{{-- Mi css --}}
	@if (Auth::user()->discapacidad == "daltonismo" || Auth::user()->discapacidad =="ceguera")
	<link rel="stylesheet" href="{{ asset('css/mainAccesible.css') }}">
	@else
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	@endif

</head>
<body>
	
	<!-- Menu de navegación -->
	@include('admin.template.partials.nav') 

	{{-- Contenedor de la pagina entera --}}
	<content id="mainContent" id="" tabindex="-1">

		<div class="row" id="panelPretederminado" hidden style="margin: 0.05%">
			<div class="@yield('class-panel', 'col-md-offset-1 col-md-10')">
				<section class="section-admin">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h1 class="panel-title">@yield('panel-title','Default')</h3>
							</div>
							<div class="panel-body" >
								@yield('content','default') 
							</div>
						</div>
					</section>
				</div>
			</div>
			
			@yield('extraSpace')

		</content>


		{{-- Footer --}}
		<footer class="site-footer" hidden>
			
			<div class="container">
				<div class="main-footer">
					<div class="row">
						<div class="col-md-12">
							<h1 class="slogan">Arquitectura de Celulares</h1>
							<p class="links">
								<a href="{{ route('admin.users.index') }}">Usuarios</a>
								<a href="{{ route('admin.cursos.index') }}">Cursos</a>
								<a href="{{ route('admin.configuracion.index') }}">Configuración </a>
								<a href="{{ url('/logout') }}">Cerrar sesión</a>
							</p>
							
							<p class="nombres-footer"><a name="about"></a>Tutorial web desarrollado por: Yojhan Rodriguez y Jeisson Sindicue</p>
							<p class="copywrite"><a name="about"></a>Universidad Distrital Francisco José de Caldas - Facultad Tecnológica</p>
							<p class="copywrite">Bogotá, Colombia - 2016 </p>
							<p class="links"><a href="#top">Volver al inicio</a></p>
							<a href="http://www.w3.org/WAI/WCAG2A-Conformance"
							title="Explanation of WCAG 2.0 Level A Conformance">
							<img height="32" width="88" 
							src="http://www.w3.org/WAI/wcag2A"
							alt="Level A conformance, 
							W3C WAI Web Content Accessibility Guidelines 2.0"></a>
						</div>
					</div>
				</div>
			</div>
		</footer>


		{{-- Scripts --}}

		<script src="{{ asset('plugins/jquery/jquery-2.1.4.js') }}"></script>
		<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
		<script src="{{ asset('plugins/bootstrap/js/bootstrap-accessibility.js') }}"></script>
		<script src="{{ asset('plugins/bootstrap-table/dist/bootstrap-table.js') }}"></script>
		<script src="{{ asset('plugins/bootstrap-table/dist/locale/bootstrap-table-es-MX.js') }}"></script>
		<script src="{{ asset('plugins/jquery/jquery-birthday-picker.js') }}"></script>
		<script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
		<script src="{{ asset('plugins/trumbowyg/trumbowyg.js') }}"></script>
		<script src="{{ asset('plugins/jquery/jquery.validate.js') }}"></script>
		<script src="{{ asset('plugins/bootstrap-progress/bootstrap-progressbar.js') }}"></script>
		<script src="{{ asset('plugins/highcharts/highcharts.js') }}"></script>


		{{-- Javascript --}}
		@yield('js')
		<script type="text/javascript">
			$(".site-footer").fadeIn(1000);
		</script>
	</body>
	</html>					


	@if (Auth::user()->discapacidad == "bajaVision")
	<style type="text/css">
		body{
			font-size: 20px;
		}
	</style>
	@endif				
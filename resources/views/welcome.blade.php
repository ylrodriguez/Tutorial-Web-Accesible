<!DOCTYPE html>
<html lang="es">
<head>
	<title>Arquitectura Celulares</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap-flatly.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/stripes-html5/css/main.css') }}">
</head>
<body>

	<!-- Header -->
	<section id="header">
		<div class="inner">
			{{--  <img alt="" src="{{ asset('img/whiteicon.png') }}"> --}}
			<span class="icon major fa-mobile"></span>
			<h1>Hola, bienvenido al tutorial web de</br><strong>Arquitectura de celulares</strong></h1>

				<p> Acá encontrarás diferentes cursos y lecciones que te ayudarán a<br /> mejorar tu conocimiento acerca de estos dispositivos.</p>
					<ul class="actions uniform">
						<li><a href="{{ url('/login') }}" class="btn btn-primary scrolly">Inicia sesión</a></li>
						 <li><a href="{{ url('/register') }}"  class="btn btn-primary">Registrate</a></li>
					</ul>

				
						<ul class="actions descrubre">
							<li><a href="#one" class="btn btn-primary scrolly">Descubre</a></li>
						</ul>
					
					
				</div>
			</section>

			<!-- One -->
			<section id="one" class="main style1">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
							<header class="major">
								<h2>¿Qué somos?</h2>
							</header>
							<p>Somos un tutorial web especializado en la arquitectura de los celulares modernos. Acá encontrarás ciertos cursos y lecciones para facilitar el aprendizaje sobre estos dispositivos que pueden llegar a ser bastante complejos.</p>
						</div>
						<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
							<img class="img-responsive center-block"  style="max-height: 333px; max-width: 333px" src="/img/phonelist.jpg" alt="" />
						</div>
					</div>
				</div>
			</section>

			<!-- Two -->
			<section id="two" class="main style2">
				<div class="container">
					<div class="row 150%">
						<div class="6u 12u$(medium)">
							<ul class="major-icons">
								<li><span class="icon style1 major fa-child "></span></li>
								<li><span class="icon style2 major fa-bolt"></span></li>
								<li><span class="icon style3 major fa-mobile"></span></li>
								<li><span class="icon style4 major fa-cog"></span></li>
								<li><span class="icon style5 major fa-desktop"></span></li>
								<li><span class="icon style6 major fa-calendar"></span></li>
							</ul>
						</div>
						<div class="6u$ 12u$(medium)">
							<header class="major">
								<h2>¿Cómo lo hacemos?</h2>
								</header>
								<p>A través de este portal web, dejamos a disposición de la comunidad diferentes cursos con distintos temas relacionados a los celulares y sus componentes.</p>
								<p>Estos cursos vienen integrados con diferentes lecciones las cuales tienen su teoria pertinente, un video tutorial y una evaluación para calificar la lección. Al final de cada lección y cada vez que avances más en un curso irás acumulando puntos y asi poder evaluar tu progreso en el tutorial.</p>
								<p>Por último este tutorial web ofrece una sección de comentarios en cada lección y un chat para que lo usuarios compartan sus experiencias del tutorial. No sobra mencionar que el objetivo principal de este portal web es ofrecer estos cursos a cualquier persona; por eso se rige bajo los estándares de accesbilidad de la W3C y asi poder garantizar que el contenido llegue a más personas.</p>
							</div>
						</div>
					</div>
				</section>

				<!-- Three -->
				<section id="three" class="main style1 special">
					<div class="container">
						<header class="major">
							<h2>Únete a nuestra comunidad</h2>
						</header>
						<p>Comparte, interactúa y aprende más con las siguientes herramientas:</p>
						<div class="row 150%">
							<div class="4u 12u$(medium)">
								<i class="fa fa-youtube-play fa-3x"></i>
								<h3>Lecciones</h3>
								<p>Lecciones a través de videos con sus respectivos subtitulos. Además para completar éstos, se añade la lección en escrito con su respectiva teoria.</p>
							</div>
							<div class="4u 12u$(medium)">
								<i class="fa fa-list-alt fa-3x"></i>
								<h3>Evaluaciones</h3>
								<p>Al final de cada lección, encontrarás habilitada una pestaña de evaluación la cual te permitirá evaluar que tanto aprendiste. </p>
							</div>
							<div class="4u$ 12u$(medium)">
								<i class="fa fa-comments  fa-3x"></i>
								<h3>Chat y discusión</h3>
								<p>Por último, encontrarás un chat de la comunidad para resolver cualquier inquietud y un panel de discusión en cada lección para compartir tu opinión..</p>
							</div>
						</div>
					</div>
				</section>

				<!-- Four -->
				<section id="four" class="main style2 special">
					<div class="container">
						<header class="major">
							<h2>¿Aún no estás registrado?</h2>
						</header>
						<p>¡No esperes más y únete!</p>
						<ul class="actions uniform">
							<li><a href="{{ url('/register') }}" class="button special">Registrate</a></li>
						</ul>
					</div>
				</section>


				<!-- Scripts -->
				<script src="{{ asset('plugins/jquery/jquery-2.1.4.js') }}"></script>
				<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>

				<script src="{{ asset('plugins/stripes-html5/js/jquery.scrolly.min.js') }}"></script>
				<script src="{{ asset('plugins/stripes-html5/js/skel.min.js') }}"></script>
				<script src="{{ asset('plugins/stripes-html5/js/util.js') }}"></script>
				<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
				<script src="{{ asset('plugins/stripes-html5/js/main.js') }}"></script>

			</body>
			</html>


<nav class="navbar navbar-default">
  <div class="container-fluid" id="top">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

        <span class="sr-only">Menu:</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <div class="saltarcontenido">
      <a id="skipContent" href="#mainContent" class="sr-only sr-only-focusable"><span> Ir al contenido principal</span></a>
      </div>

      <a class="navbar-brand figura-cuadrado" href="/member">
        @if (Auth::user()->discapacidad == "daltonismo" || Auth::user()->discapacidad =="ceguera")
          <img alt="Ir a página de inicio." src="{{ asset('img/untitled.png') }}">
        @else
          <img alt="Ir a página de inicio." src="{{ asset('img/icon-final.png') }}">
        @endif
        
      </a> 
    </div>


    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <div id="lecciones-div">
        <ul class="nav navbar-nav">
          <li><a href="{{ route('member.cursos.index') }}">Cursos</a></li>
          {{-- comment --}}
          <li class="dropdown" id="leccion-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lecciones<span class="caret" id="Este"></span></a>
            <ul class="dropdown-menu" id="ulLecciones">
              <li id="refresh-leccion"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate col-md-3 col-md-offset-4"></span></li>
            </ul>
          </li>
          <li><a href="{{ route('member.progreso.index') }}">Progreso</a></li>
        </ul>
      </div>

      
      <!--Nav Bar Right -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/member">Página principal</a></li>
        <li><a href="/member#chat">Chat</a></li>
         <li><a href="{{ route('member.ayuda.index') }}">Ayuda</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opciones<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('member.perfil.show', Auth::user()->slug) }}"><span class="glyphicon glyphicon-user" style="padding-right: 5px;"></span>Mi perfil</a></li>
            <li><a href="{{ route('member.configuracion.index') }}"><span class="glyphicon glyphicon-cog" style="padding-right: 5px;"></span>Configuración</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-off" style="padding-right: 5px;"></span>Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="test-dos" hidden id="test-dos"></div>

<script src="{{ asset('plugins/jquery/jquery-2.1.4.js') }}"></script>


<script type="text/javascript">
  $('#lecciones-div ul > #leccion-dropdown > a').click(function(evt) { 

   if(!$(this).hasClass('consulted')){
      // con la variable consulted
      console.log('No se ha consultado.. cargando cursos y lecciones');
        //$(this).addClass('consulted');
        $.ajax({
          dataType: 'json',
          url: '{{ url('member/request/cursos')}}',
          type: 'get',
          success:  function (response) {
            var data_length = response.length;
            
            for(var i=0; i<data_length; i++){
              console.log(response[i].lecciones);
              console.log('-----------------------------');

              $tituloCurso =  response[i].titulo;
              $idCurso = response[i].id;

              var varAppend ='<li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">'+ $tituloCurso+'</a><ul class="dropdown-menu"><li><a  href="/member/cursos/lecciones/'+$idCurso+'">Abrir lista de lecciones<span class="glyphicon glyphicon-th-list" style="padding-left: 10px;"></span></a></li> <li role="separator" class="divider"></li>';

              for(var j=0; j<response[i].lecciones.length; j++){
                $titulo =response[i].lecciones[j].titulo;
                $slug = response[i].lecciones[j].slug;
                $id = response[i].lecciones[j].id;
                $num = j+1;

                $url = 'member/cursos/open/'+$slug+'?id='+$id+'&num='+$num;
                
                varAppend += '<li><a  href="/'+$url+'">'+$titulo+'</a></li>';
              }

              varAppend += '</ul></li>';
              $('#ulLecciones').append(varAppend);
              $('#ulLecciones li:first').remove();
              // Necesita llamar a la función de java script despues de cargar todos los elementos
              startSubmenuScript();
            }
          }
        });
      }
      else{
        console.log('Ya se ha consultado!'); // con la variable consulted
      }
    });

  function startSubmenuScript(){
    $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
      event.preventDefault(); 
      event.stopPropagation(); 
      $(this).parent().siblings().removeClass('open');
      $(this).parent().toggleClass('open');
    });
  }
</script>
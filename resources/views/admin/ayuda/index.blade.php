@extends('admin.template.main')

@section('title','Ayuda')


@section('extraSpace')

<div class="row" hidden id="panelAyuda">
  <div class="col-md-offset-2 col-md-8">
    <section class="section-admin" >
      <div class="panel panel-default" style="border-radius:1.5em;">
        <div class="panel-body"  style="background-color: #375A7F; border-radius:1.5em;">


          <div class="row">
           <div class="col-md-12">
            <div class="panel panel-default" style="border-color:#375A7F;">
              <div class="panel-body" style="background-color: #375A7F">
               <div class="col-md-12">
                 <h1 style="color: white">Manual de usuario <i class="fa fa-book"></i></h1>
               </div>
             </div>
           </div>
         </div>
       </div>

       <div class="row">
         <div class="panel panel-default" style="border-color:#375A7F;">
          <div class="panel-body" style="background-color: #375A7F">
            {{-- //////////////////INTRODUCCION///////////////////////// --}}
            <div class="col-md-12 shadow-border margin-bottom">
             <div class="col-md-6">
              <h2 class="midsize" style="margin-top:0"><a id="introduccion" href="#introduccion">1. Introducción al módulo de administración</a></h2>
              <p>El módulo de administración ofrece caracteristicas adicionales al módulo de usuario. Aunque un administrador también puede consultar los cursos, empezar lecciones, realizar evaluaciones y obtener puntos, las opciones no se limitan ahí. Un administrador puede de igual manera modificar los datos de un usuario, crear o modificar cursos, lecciones y evaluaciones, entre otras opciones.</p>
            </div>
            <div class="col-md-6">
              <ul class="major-icons">
                <li><span class="icon style3 major fa-mobile"></span></li>
                <li><span class="icon style4 major fa-cog"></span></li>
              </ul>
            </div>
          </div>
          {{-- ////////////////////BARRA NAVEGACION////////////////// --}}
          <div class="col-md-12 shadow-border margin-bottom">
           <div class="col-md-12">
            <h2 class="midsize" style="margin-top:0"><a id="barranavegacion" href="#barranavegacion">2. Barra de navegación</a></h2>
            <p>La barra de navegación se encuentra en la parte superior de la ventana principal y facilita la exploración de diferentes componentes del tutorial.</p>
          </div>
          <div class="col-md-12 margin-bottom">
            <a href="http://arqtutorial:8080/img/guidelines-admin/2barranavegacion.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
             <img src="/img/guidelines-admin/2barranavegacion.png" class="img-responsive img-rounded" alt="Imagen de la barra de navegación" style="margin-top: 1.5%; max-height:100px;"></a>
           </div>

           <div class="col-md-12 margin-bottom">
            <p>Cabe resaltar que los componentes de la barra de navegación son accesibles y cuenta con un link principal oculto que se dirige inmediatamente al contenido principal. Los otros componentes de la barra de navegación son los siguientes:</p>
            <ul>
              <li><a href="#paginaprincipal">Logo del tutorial o página principal</a></li>
              <li><a href="#usuarios">Usuarios</a></li>
              <li><a href="#cursos">Cursos</a></li>
              <li><a href="#lecciones">Lecciones</a></li>
              <li><a href="#progreso">Progreso</a></li>
              <li><a href="#chat">Chat</a></li>
              <li><a href="#ayuda">Ayuda</a></li>
              <li><a href="#opciones">Opciones</a></li>
            </ul> 
          </div>

        </div>
        {{-- ////////////////////PAGINA PRINCIPAL///////////////////// --}}


        <div class="col-md-12 shadow-border margin-bottom">
          <div class="col-md-12 margin-bottom">
            <h2 class="midsize" style="margin-top:0"><a id="paginaprincipal" href="#paginaprincipal">3. Página principal</a></h2>
            <p>Es la página de inicio cuando un usuario tipo administrador accede al tutorial. Tanto la imagen del logo del tutorial como el elemento llamado página principal de la barra de navegación se dirigen a esta página del panel de administración. Esta página cuenta con un pequeño mensaje de bienvenida. </p>
          </div>

          <div class="col-md-12 margin-bottom">
            <div class="col-md-8">
              <a href="http://arqtutorial:8080/img/guidelines-admin/3paginaprincipal.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
                <img src="/img/guidelines-admin/3paginaprincipal.png" class="img-responsive img-rounded" alt="Imagen de la página de inicio y sus componentes" style="margin-top: 1.5%; max-height:500px;"></a>
              </div>
              <div class="col-md-4"><p>En la página principal se encuentran cuatro botones que muestran información general. El primer boton de <a href="#usuarios">Usuarios</a> se dirige al módulo de usuarios y muestra el número de usuarios que se encuentran en el tutorial web. El botón de <a href="#cursos">Cursos</a> muestra el número de cursos activos y se dirige a la lista de cursos. El botón de <a href="#lecciones">Lecciones</a> muestra el número de lecciones en todo el tutorial y se dirige a la lista de lecciones Por último el boton de <a href="#leccionescomentario">Comentarios</a> muestra el total de comentarios en todas las lecciones</p>
                <p>En el panel inferior se encuentran gráficas con estadisticas del comportamiento de los usuarios en el tutorial de caracter informativo y en la parte izquierda está alojado el <a href="#chat">Chat</a>.</p>
              </div>
            </div>
          </div>

          {{-- /////////////////////USUARIOS///////////////////// --}}


          <div class="col-md-12 shadow-border margin-bottom">
            <div class="col-md-12 margin-bottom">
              <h2 class="midsize" style="margin-top:0"><a id="usuarios" href="#usuarios">4. Usuarios</a></h2>
              <p>Es la página donde se encuentra la lista completa de todos los usuarios (Activos o no activos) del tutorial y brinda al administrador ciertas opciones que se explicarán a continuación. Para acceder a esta página solo basta con hacer click en el elemento de la barra de navegación llamado usuarios. </p>
            </div>

            <div class="col-md-12 margin-bottom">
              <div class="col-md-8">
                <a href="http://arqtutorial:8080/img/guidelines-admin/4usuarios.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
                  <img src="/img/guidelines-admin/4usuarios.png" class="img-responsive img-rounded" alt="Imagen de lista de usuarios" style="margin-top: 1.5%; max-height:500px;"></a>
                </div>
                <div class="col-md-4">

                  <p>En la lista de usuarios podemos encontrar distinta información como lo es el id del usuario, su estado <span class="btn-success btn-xs glyphicon glyphicon-ok"></span> Activo o <span class="btn-danger btn-xs glyphicon glyphicon-remove"></span> No activo, el nombre del usuario, su correo, el nombre de usuario o username, fecha de nacimiento, fecha de registro, discapacidad (si aplica), pais, tipo de usuario y unas <a  href="#usuariosopciones">Opciones</a> para ver detalles del usuario o modificar sus datos.</p>
                  <p>En la parte inferior izquierda se encuentra el paginado de usuarios y en la parte inferior derecha un boton para crear un nuevo usuario.</p>


                </div>

                <div class="col-md-12">
                  <h3 class="smallsize"><a id="usuariosopciones" href="#usuariosopciones">4.1 Opciones</a></h3> 
                  <p>En la columna de opciones de la lista de usuarios tenemos dos tipos de opciones:</p>
                  <div class="col-md-12 margin-bottom">
                    <div class="col-md-6"><p><span class="btn btn-info  glyphicon glyphicon-list-alt" aria-hidden="true"></span>  Ver perfil </p> <p>Redirecciona a la página del <a href="#perfil">Perfil</a> del usuario seleccionado donde muestra información pública del usuario como lo es su biografia y puntaje.</p></div>
                    <div class="col-md-6"><p><span class="btn btn-warning  glyphicon glyphicon-wrench" aria-hidden="true"></span>  Editar usuario </p> <p>Redirecciona a la página de <a href="#configuracion">Configuracion</a> donde muestra información del usuario seleccionado la cual se puede modificar.</p> 
                    </div>
                  </div>

                  <p>Nota: Cabe recordar que un administrador solo puede modificar datos de un usuario tipo miembro. Es decir que cuando se consulta un usuario administrador solo es posible ver el perfil de éste.</p>
                </div>

              </div>
            </div>
            
             {{-- /////////////////////CURSOS///////////////////// --}}

          </div>
        </div>
      </div>  



    </div>
  </div>
</section>
</div>
</div>

@endsection

{{-- Javascript --}}
@section('js')

<script>
  $('#panelAyuda').fadeIn(600);
  $('.panel-cursos').slideToggle(1500);
  $('.alert').delay(4000).slideUp(1000);
</script>


@endsection


<style type="text/css">

</style>



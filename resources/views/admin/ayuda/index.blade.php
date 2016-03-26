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
                  <div class="col-md-12 margin-bottom" style="border:solid 1px black;background-color:#545454; padding: 5px">
                    <div class="col-md-6"><p><span class="btn btn-info  glyphicon glyphicon-list-alt" aria-hidden="true"></span>  Ver perfil </p> <p>Redirecciona a la página del <a href="#perfil">Perfil</a> del usuario seleccionado donde muestra información pública del usuario como lo es su biografia y puntaje.</p></div>
                    <div class="col-md-6"><p><span class="btn btn-warning  glyphicon glyphicon-wrench" aria-hidden="true"></span>  Editar usuario </p> <p>Redirecciona a la página de <a href="#configuracion">Configuración</a> donde muestra información del usuario seleccionado la cual se puede modificar.</p> 
                    </div>
                  </div>

                  <p>Nota: Cabe recordar que un administrador solo puede modificar datos de un usuario tipo miembro. Es decir que cuando se consulta un usuario administrador solo es posible ver el perfil de éste.</p>
                </div>

              </div>
            </div>
            
            {{-- /////////////////////CURSOS///////////////////// --}}

            <div class="col-md-12 shadow-border margin-bottom">
              <div class="col-md-12 margin-bottom">
                <h2 class="midsize" style="margin-top:0"><a id="cursos" href="#cursos">5. Cursos</a></h2>
                <p>En este módulo se encuentra la lista de los cursos activos del tutorial web. Por el momento solo se tiene uno pero se abre la posibilidad de crear más para futuros proyectos. Para acceder a este panel solo basta con hacer click en la pestaña de cursos del menu de navegación. </p>
              </div>

              <div class="col-md-12 margin-bottom">
                <div class="col-md-8">
                  <a href="http://arqtutorial:8080/img/guidelines-admin/5cursos.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
                    <img src="/img/guidelines-admin/5cursos.png" class="img-responsive img-rounded" alt="Imagen del modulo de cursos" style="margin-top: 1.5%; max-height:500px;"></a>
                  </div>
                  <div class="col-md-4">
                    <p>En este panel de lista de cursos se pueden observar todos los cursos activos en el tutorial web. Se puede a su vez observar la pequeña descripción del curso y la imagen pertinente a éste.</p>
                    <p>Existen dos opciones en este panel; la primera es agregar un nuevo curso y la segunda es editar el curso que ya existe. Solo basta con seleccionar cualquiera de las opciones y se agregará o modificará un curso.</p>
                  </div>
                </div>
              </div>


              {{-- /////////////////////LECCIONES///////////////////// --}}

              <div class="col-md-12 shadow-border margin-bottom">
                <div class="col-md-12 margin-bottom">
                  <h2 class="midsize" style="margin-top:0"><a id="lecciones" href="#lecciones">6. Lecciones</a></h2>
                  <p>En este módulo se encuentra la lista de las lecciones del curso que se haya escogido. Para acceder a este panel solo basta con hacer click en la pestaña de lecciones del menu de navegación, escoger el curso deseado y abrir la lista de lecciones.</p>
                </div>

                <div class="col-md-12 margin-bottom">
                  <div class="col-md-8">
                    <a href="http://arqtutorial:8080/img/guidelines-admin/6lecciones.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
                      <img src="/img/guidelines-admin/6lecciones.png" class="img-responsive img-rounded" alt="Imagen del modulo de lecciones" style="margin-top: 1.5%; max-height:500px;"></a>
                    </div>
                    <div class="col-md-4">
                      <p>En este panel se muestra el titulo y descripción del curso. Posteriormente se encuentra un botón para <a href="#agregarleccion">Añadir una nueva lección</a>. Seguido a esto se encuentra los autores del curso, el número de lecciones y el número de usuarios en el curso. </p>
                      <p>Después de este primer panel informativo, se encuentra la lista de las lecciones del curso. Por cada lección se puede encontrar la descripción y el titulo de la leccion y aparecen cuatro opciones importantes. <a href="#vistaprevia">Vista previa para ver la lección</a>, edición de la lección que funciona igual que el panel de <a href="#agregarleccion">Agregar una nueva lección</a>, <a href="#evaluacion">Edición o creación de una evaluación</a> y por último la opción de eliminar lección que solo haciendo click se eliminará. </p>
                    </div>
                  </div>
                      {{-- Añadir leccion --}}
                  <div class="col-md-12">
                    <h3 class="smallsize"><a id="agregarleccion" href="#agregarleccion">6.1 Añadir nueva lección</a></h3> 
                   
                    <div class="col-md-12 margin-bottom">
                      <div class="col-md-8">
                    <a href="http://arqtutorial:8080/img/guidelines-admin/6.1agregarleccion.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
                      <img src="/img/guidelines-admin/6.1agregarleccion.png" class="img-responsive img-rounded center-block" alt="Imagen del modulo de añadir leccion" style="margin-top: 1.5%; max-height:500px;"></a>
                    </div>
                    <div class="col-md-4">
                     <p>Para acceder a este panel solo basta con hacer click en el boton de <span class="btn btn-info btn-xs" style="font-size: 1em;">Agregar nueva leccion</span> de la lista de lecciones.</p>
                      <p>En esta nueva pestaña se encuentra el panel de creación de lección donde solo se deben llenar unos pocos campos. Para crear una leción satisfactoriamente solo se debe digitar un titulo para la lección, una pequeña descripción, la teoria pertinente de la lección y el link del video de Youtube.</p>
                      <p>Una vez se hayan digitado estos datos correctamente y se haya cargado el video de Youtube, el boton de crear lección se habilitara y una vez sea seleccionado, la nueva lección estara lista para los usuarios.</p>
                    </div>
                    </div>

                  </div>


                  {{-- Vista previa --}}
                  <div class="col-md-12">
                    <h3 class="smallsize"><a id="vistaprevia" href="#vistaprevia">6.2 Vista previa de la lección</a></h3> 
                   
                    <div class="col-md-12 margin-bottom">
                      <div class="col-md-8">
                    <a href="http://arqtutorial:8080/img/guidelines-admin/6.2vistaprevia.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
                      <img src="/img/guidelines-admin/6.2vistaprevia.png" class="img-responsive img-rounded center-block" alt="Imagen del modulo de vista previa de la leccion" style="margin-top: 1.5%; max-height:500px;"></a>
                    </div>
                    <div class="col-md-4">
                     <p>Para ver la lista previa de la lección seleccionada solo basta con hacer click en el boton de <span class="btn btn-info btn-xs" style="font-size: 1em;"><i class="glyphicon glyphicon-list-alt"></i> Vista previa</span> que se encuentra en la parte derecha de cada lección.</p>
                      <p>En esta página se muestra el video de la lección, un panel inferior donde se encuentra la descripción de la lección, la <a href="#evaluacion">Evaluación</a> de la lección y su respectiva teoria. Por otra parte en el panel derecho se encuentra una zona de <a href="#leccionescomentario">Comentarios</a> para que los usuarios compartan sus opiniones de la leccion. </p>
                    </div>
                    </div>

                  </div>

                   {{-- Comentarios --}}
                  <div class="col-md-12">
                    <h3 class="smallsize"><a id="leccionescomentario" href="#leccionescomentario">6.3 Comentarios</a></h3> 
                   
                    <div class="col-md-12 margin-bottom">
                      <div class="col-md-8">
                    <a href="http://arqtutorial:8080/img/guidelines-admin/6.3comentarios.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
                      <img src="/img/guidelines-admin/6.3comentarios.png" class="img-responsive img-rounded center-block" alt="Imagen del panel de comentarios" style="margin-top: 1.5%; max-height:500px;"></a>
                    </div>
                    <div class="col-md-4">
                    <p>Para ver el panel de comentarios solo basta ir a cualquier lección y se encontrará disponible en la parte derecha de la página. Acá se podra visualizar los distintos comentarios de los miembros del tutorial.</p>
                     <p>Para añadir un comentario solo basta llenar el campo de comentarios (máximo 255 caracteres) y posteriormente hacer click en el botón de <span class="btn btn-info btn-xs" style="font-size: 1em;"> Añadir comentario</span>.</p>
                    </div>
                    </div>
                  </div>


                  {{-- Evaluación --}}
                  <div class="col-md-12">
                    <h3 class="smallsize"><a id="evaluacion" href="#evaluacion">6.4 Evaluación</a></h3>
                    <p>Las evaluaciones son creadas con el objetivo de que el usuario pueda calificar su progreso en el tutorial.</p> 
                   
                    <div class="col-md-12 margin-bottom">
                      <div class="col-md-8">
                    <a href="http://arqtutorial:8080/img/guidelines-admin/6.4evaluaciones.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
                      <img src="/img/guidelines-admin/6.4evaluaciones.png" class="img-responsive img-rounded center-block" alt="Imagen del panel de evaluaciones" style="margin-top: 1.5%; max-height:500px;"></a>
                    </div>
                    <div class="col-md-4">
                    <p>Para realizar la evaluación solo basta con ir al panel inferior de una lección e ir a la pestaña de Evaluación. Una vez la evaluación es visible, podemos ver cierta información como el puntaje, el número de intentos, el título de esta evaluación y su descripción. Por ultimo aparecen las respectivas preguntas y respuestas y se completa la evaluación haciendo click en el botón de terminar evaluación.</p>
                    </div>
                    </div>
                  </div>


                </div>


                {{-- /////////////////////PROGRESO///////////////////// --}}

            <div class="col-md-12 shadow-border margin-bottom">
              <div class="col-md-12 margin-bottom">
                <h2 class="midsize" style="margin-top:0"><a id="progreso" href="#progreso">7. Progreso</a></h2>
                <p>En este módulo se encuentra el progreso del usuario en el curso de Arquitectura de celulares</p>
              </div>

              <div class="col-md-12 margin-bottom">
                <div class="col-md-8">
                  <a href="http://arqtutorial:8080/img/guidelines-admin/7progreso.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
                    <img src="/img/guidelines-admin/7progreso.png" class="img-responsive img-rounded center-block" alt="Imagen del modulo de progreso" style="margin-top: 1.5%; max-height:500px;"></a>
                  </div>
                  <div class="col-md-4">
                    <p>Esta página empieza mostrando información básica acerca del usuario y el total de puntos que ha conseguido de acuerdo a su actividad en el tutorial.</p>
                    <p>Empieza mostrando una barra de progreso con el porcentaje completado en el curso. Posteriormente, muestra las lecciones que el usuario ha iniciado y ha terminado y muestra una pequeña gráfica para representar esto.</p>
                    <p>Por último muestra todas las evaluaciones realizadas por el usuario con el puntaje obtenido y los intentos realizados. Además, muestra una gráfica para representar estadisticamente esto.</p>
                  </div>
                </div>
              </div>


                {{-- /////////////////////CHAT///////////////////// --}}

            <div class="col-md-12 shadow-border margin-bottom">
              <div class="col-md-12 margin-bottom">
                <h2 class="midsize" style="margin-top:0"><a id="chat" href="#chat">8. Chat</a></h2>
                <p>Aquí se encuentra alojado el sistema de chat para el tutorial web. Aquí los usuarios pueden compartir sus experiencias del tutorial de forma inmediata.</p>
              </div>

              <div class="col-md-12 margin-bottom">
                <div class="col-md-8">
                  <a href="http://arqtutorial:8080/img/guidelines-admin/8chat.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
                    <img src="/img/guidelines-admin/8chat.png" class="img-responsive img-rounded center-block" alt="Imagen del modulo de chat" style="margin-top: 1.5%; max-height:500px;"></a>
                  </div>
                  <div class="col-md-4">
                    <p>Para acceder al chat solo falta ir a la página principal del tutorial y encontrar el panel de la derecha donde se aloja el sistema del Chat. Una vez localizado se pueden ver los mensajes del chat con su respectivo usuario y fecha. Para añadir un mensaje al chat solo falta con escribir el nombre de usuario propio, el mensaje y por último hacer click en OK.</p>
                    <p>Nota: Este chat es público y su uso es solo para propósitos académicos.</p>
                  </div>
                </div>
              </div>

               {{-- /////////////////////AYUDA///////////////////// --}}

            <div class="col-md-12 shadow-border margin-bottom">
              <div class="col-md-12 margin-bottom">
                <h2 class="midsize" style="margin-top:0"><a id="ayuda" href="#ayuda">9. Ayuda</a></h2>
                <p>Aquí se encuentra el manual de usuario para guiar al usuario en el uso del tutorial web.</p>
              </div>
              </div>



              {{-- /////////////////////OPCIONES///////////////////// --}}

              <div class="col-md-12 shadow-border margin-bottom">
                <div class="col-md-12 margin-bottom">
                  <h2 class="midsize" style="margin-top:0"><a id="opciones" href="#opciones">10. Opciones</a></h2>
                  <p>Es la ultima opcion de la barra de navegación. Al hacer click aquí se despliega un submenu que contiene 3 elementos:</p>
                  <ul>
                    <li><a href="#perfil">Mi perfil</a></li>
                    <li><a href="#configuracion">Configuracion</a></li>
                    <li><a href="#cerrarsesion">Cerrar sesión</a></li>
                  </ul> 
                </div>

                {{-- Mi perfil --}}
                <div class="col-md-12">
                  <h3 class="smallsize"><a id="perfil" href="#perfil">10.1 Mi perfil</a></h3> 

                  <div class="col-md-12 margin-bottom">
                    <div class="col-md-8">
                      <a href="http://arqtutorial:8080/img/guidelines-admin/10.1perfil.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
                        <img src="/img/guidelines-admin/10.1perfil.png" class="img-responsive img-rounded center-block" alt="Imagen del modulo de perfil de usuario" style="margin-top: 1.5%; max-height:500px;"></a>
                      </div>
                      <div class="col-md-4">
                       <p>En esta página se encuentra el perfil público del usuario. En la parte superior muestra datos básicos como el nombre, biografia y el puntaje en el tutorial. Por último se ve una barra de progreso del curso.</p>
                     </div>
                     </div>
                 </div>

                 {{-- Configuracion --}}
                <div class="col-md-12">
                  <h3 class="smallsize"><a id="configuracion" href="#configuracion">10.2 Configuración</a></h3> 
                  
                  <div class="col-md-12 margin-bottom">
                    <div class="col-md-8">
                      <a href="http://arqtutorial:8080/img/guidelines-admin/10.2configuracion.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
                        <img src="/img/guidelines-admin/10.2configuracion.png" class="img-responsive img-rounded center-block" alt="Imagen del modulo de configuracion" style="margin-top: 1.5%; max-height:500px;"></a>
                      </div>
                      <div class="col-md-4">
                       <p>En esta página se encuentra todos los datos registrados del usuario en el tutorial. Solo basta con reemplazar los campos deseados con nueva información para sustituir la información.</p>
                       <p>Además acá se puede editar más información como lo es la contraseña, el tipo de usuario y la imagen de perfil.</p>
                     </div>
                   </div>
                 </div>

                 {{-- Cerrar sesión --}}
                <div class="col-md-12 margin-bottom">
                  <h3 class="smallsize"><a id="cerrarsesion" href="#cerrarsesion">10.3 Cerrar sesión</a></h3> 
                  <p>En esta última opción el usuario cerrará sesión en el tutorial de forma segura.</p>
                 </div>



              </div>




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



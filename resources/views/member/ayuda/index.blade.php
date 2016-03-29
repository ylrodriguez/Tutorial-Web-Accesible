@extends('member.template.main')

@section('title','Ayuda')


@section('extraSpace')

<div class="row" hidden id="panelAyuda">
  <div class="col-md-offset-2 col-md-8">
    <section class="section-member" >
      <div class="panel panel-default" style="border-radius:1.5em;">
        <div class="panel-body"  style="@if (Auth::user()->discapacidad == "daltonismo" || Auth::user()->discapacidad =="ceguera")background-color: #2c3e50; @else background-color: #375A7F; @endif; border-radius:1.5em;">


          <div class="row">
           <div class="col-md-12">
            <div class="panel panel-default" style="@if (Auth::user()->discapacidad == "daltonismo" || Auth::user()->discapacidad =="ceguera")border-color:#2c3e50;@else border-color:#375A7F;@endif">
              <div class="panel-body" style="@if (Auth::user()->discapacidad == "daltonismo" || Auth::user()->discapacidad =="ceguera")background-color: #2c3e50; @else background-color: #375A7F; @endif">
               <div class="col-md-12">
                 <h1 style="color: white">Manual de usuario <i class="fa fa-book"></i></h1>
               </div>
             </div>
           </div>
         </div>
       </div>

       <div class="row">
         <div class="panel panel-default" style="@if (Auth::user()->discapacidad == "daltonismo" || Auth::user()->discapacidad =="ceguera")border-color:#2c3e50;@else border-color:#375A7F;@endif">
          <div class="panel-body" style="@if (Auth::user()->discapacidad == "daltonismo" || Auth::user()->discapacidad =="ceguera")background-color: #2c3e50; @else background-color: #375A7F; @endif">
            {{-- //////////////////INTRODUCCION///////////////////////// --}}
            <div class="col-md-12 shadow-border margin-bottom">
             <div class="col-md-6">
              <h2 class="midsize" style="margin-top:0"><a id="introduccion" href="#introduccion">1. Introducción al módulo de usuarios</a></h2>
              <p>El tutorial web ofrece a sus usuarios distintos servicios como consultar los cursos que se encuentran disponibles e inscribirse a éstos, empezar lecciones que vienen en los cursos, realizar evaluaciones para evaluar el progreso de aprendizaje, obtener puntos, personalizar el perfil entre otras opciones que ayudaran al miembro a adquirir conocimiento sobre la arquitectura de los celulares modernos.</p>
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
            <a href="http://arqtutorial:8080/img/guidelines-member/2barranavegacion.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
             <img src="/img/guidelines-member/2barranavegacion.png" class="img-responsive img-rounded" alt="Imagen de la barra de navegación" style="margin-top: 1.5%; max-height:100px;"></a>
           </div>

           <div class="col-md-12 margin-bottom">
            <p>Cabe resaltar que los componentes de la barra de navegación son accesibles y cuenta con un link principal oculto que se dirige inmediatamente al contenido principal. Los otros componentes de la barra de navegación son los siguientes:</p>
            <ul>
              <li><a href="#paginaprincipal">Logo del tutorial o página principal</a></li>
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
            <p>Es la página de inicio cuando un miembro accede al tutorial. Tanto la imagen del logo del tutorial como el elemento llamado página principal de la barra de navegación se dirigen a esta página del panel de usuarios. </p>
          </div>

          <div class="col-md-12 margin-bottom">
            <div class="col-md-8">
              <a href="http://arqtutorial:8080/img/guidelines-member/3paginaprincipal.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
                <img src="/img/guidelines-member/3paginaprincipal.png" class="img-responsive img-rounded" alt="Imagen de la página de inicio y sus componentes" style="margin-top: 1.5%; max-height:500px;"></a>
              </div>
              <div class="col-md-4"><p> Esta página cuenta con un pequeño mensaje de bienvenida y más detalles como el nombre del usuario, su correo electrónico, los cursos a los cuales está inscrito y las evaluaciones que ha realizado.</p>
              <p>Al lado derecho de esta pagina podemos encontrar el <a href="#chat">Chat</a> oficial del tutorial web para que los usuarios puedan compartir sus opiniones y experiencias en los cursos y lecciones.</p>
              </div>
            </div>
          </div>

         
            
            {{-- /////////////////////CURSOS///////////////////// --}}

            <div class="col-md-12 shadow-border margin-bottom">
              <div class="col-md-12 margin-bottom">
                <h2 class="midsize" style="margin-top:0"><a id="cursos" href="#cursos">4. Cursos</a></h2>
                <p>En este módulo se encuentra la lista de los cursos activos del tutorial web. Por el momento solo se tiene un curso que es el de arquitectura de celulares el cual fue el objetivo por el cual se creo este tutorial web. Para acceder a este panel solo basta con hacer click en la pestaña de cursos del menu de navegación. </p>
              </div>

              <div class="col-md-12 margin-bottom">
                <div class="col-md-8">
                  <a href="http://arqtutorial:8080/img/guidelines-member/4cursos.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
                    <img src="/img/guidelines-member/4cursos.png" class="img-responsive img-rounded" alt="Imagen del modulo de cursos" style="margin-top: 1.5%; max-height:500px;"></a>
                  </div>
                  <div class="col-md-4">
                    <p>En este panel de lista de cursos se pueden observar todos los cursos activos en el tutorial web. Se puede a su vez observar la pequeña descripción del curso y la imagen pertinente a éste.</p>
                    <p>Haciendo click en ir al curso, el usuario se dirigira a la página principal de las lecciones del curso.</p>
                  </div>
                </div>
              </div>


              {{-- /////////////////////LECCIONES///////////////////// --}}

              <div class="col-md-12 shadow-border margin-bottom">
                <div class="col-md-12 margin-bottom">
                  <h2 class="midsize" style="margin-top:0"><a id="lecciones" href="#lecciones">5. Lecciones</a></h2>
                  <p>En este módulo se encuentra la lista de las lecciones del curso que se haya escogido. Para acceder a este panel solo basta con hacer click en la pestaña de lecciones del menu de navegación, escoger el curso deseado y abrir la lista de lecciones.</p>
                </div>

                <div class="col-md-12 margin-bottom">
                  <div class="col-md-8">
                    <a href="http://arqtutorial:8080/img/guidelines-member/5lecciones.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
                      <img src="/img/guidelines-member/5lecciones.png" class="img-responsive img-rounded" alt="Imagen del modulo de lecciones" style="margin-top: 1.5%; max-height:500px;"></a>
                    </div>
                    <div class="col-md-4">
                      <p>En este panel se muestra el titulo y descripción del curso. Seguido a esto se encuentra los autores del curso, el número de lecciones y el número de usuarios en el curso. </p>
                      <p>Después de este primer panel informativo, se encuentra la lista de las lecciones del curso. Por cada lección se puede encontrar la opcion de <a href="#empezarleccion">Empezar lección</a> la cual llevara al usuario a la página de la lección. </p>
                    </div>
                  </div>


                  {{-- Empezar leccion --}}
                  <div class="col-md-12">
                    <h3 class="smallsize"><a id="empezarleccion" href="#empezarleccion">5.1 Empezar lección</a></h3> 
                   
                    <div class="col-md-12 margin-bottom">
                      <div class="col-md-8">
                    <a href="http://arqtutorial:8080/img/guidelines-member/5.1empezarleccion.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
                      <img src="/img/guidelines-member/5.1empezarleccion.png" class="img-responsive img-rounded center-block" alt="Imagen del modulo de vista previa de la leccion" style="margin-top: 1.5%; max-height:500px;"></a>
                    </div>
                    <div class="col-md-4">
                     <p>Para ver la lección seleccionada solo basta con hacer click en el boton de <span class="btn btn-info btn-xs" style="font-size: 1em;">Empezar lección</span> que se encuentra en la parte derecha de cada lección.</p>
                      <p>En esta página se muestra el video de la lección, un panel inferior donde se encuentra la descripción de la lección, la <a href="#evaluacion">Evaluación</a> de la lección y su respectiva teoria. Por otra parte en el panel derecho se encuentra una zona de <a href="#leccionescomentario">Comentarios</a> para que los usuarios compartan sus opiniones de la leccion. </p>
                    </div>
                    </div>

                  </div>

                   {{-- Comentarios --}}
                  <div class="col-md-12">
                    <h3 class="smallsize"><a id="leccionescomentario" href="#leccionescomentario">5.2 Comentarios</a></h3> 
                   
                    <div class="col-md-12 margin-bottom">
                      <div class="col-md-8">
                    <a href="http://arqtutorial:8080/img/guidelines-member/5.2comentarios.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
                      <img src="/img/guidelines-member/5.2comentarios.png" class="img-responsive img-rounded center-block" alt="Imagen del panel de comentarios" style="margin-top: 1.5%; max-height:500px;"></a>
                    </div>
                    <div class="col-md-4">
                    <p>Para ver el panel de comentarios solo basta ir a cualquier lección y se encontrará disponible en la parte derecha de la página. Acá se podra visualizar los distintos comentarios de los miembros del tutorial.</p>
                     <p>Para añadir un comentario solo basta llenar el campo de comentarios (máximo 255 caracteres) y posteriormente hacer click en el botón de <span class="btn btn-info btn-xs" style="font-size: 1em;"> Añadir comentario</span>.</p>
                    </div>
                    </div>
                  </div>


                  {{-- Evaluación --}}
                  <div class="col-md-12">
                    <h3 class="smallsize"><a id="evaluacion" href="#evaluacion">5.3 Evaluación</a></h3>
                    <p>Las evaluaciones son creadas con el objetivo de que el usuario pueda calificar su progreso en el tutorial.</p> 
                   
                    <div class="col-md-12 margin-bottom">
                      <div class="col-md-8">
                    <a href="http://arqtutorial:8080/img/guidelines-member/5.3evaluaciones.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
                      <img src="/img/guidelines-member/5.3evaluaciones.png" class="img-responsive img-rounded center-block" alt="Imagen del panel de evaluaciones" style="margin-top: 1.5%; max-height:500px;"></a>
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
                <h2 class="midsize" style="margin-top:0"><a id="progreso" href="#progreso">6. Progreso</a></h2>
                <p>En este módulo se encuentra el progreso del usuario en el curso de Arquitectura de celulares</p>
              </div>

              <div class="col-md-12 margin-bottom">
                <div class="col-md-8">
                  <a href="http://arqtutorial:8080/img/guidelines-member/6progreso.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
                    <img src="/img/guidelines-member/6progreso.png" class="img-responsive img-rounded center-block" alt="Imagen del modulo de progreso" style="margin-top: 1.5%; max-height:500px;"></a>
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
                <h2 class="midsize" style="margin-top:0"><a id="chat" href="#chat">7. Chat</a></h2>
                <p>Aquí se encuentra alojado el sistema de chat para el tutorial web. Aquí los usuarios pueden compartir sus experiencias del tutorial de forma inmediata.</p>
              </div>

              <div class="col-md-12 margin-bottom">
                <div class="col-md-8">
                  <a href="http://arqtutorial:8080/img/guidelines-member/7chat.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
                    <img src="/img/guidelines-member/7chat.png" class="img-responsive img-rounded center-block" alt="Imagen del modulo de chat" style="margin-top: 1.5%; max-height:500px;"></a>
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
                <h2 class="midsize" style="margin-top:0"><a id="ayuda" href="#ayuda">8. Ayuda</a></h2>
                <p>Aquí se encuentra el manual de usuario para guiar al usuario en el uso del tutorial web.</p>
              </div>
              </div>



              {{-- /////////////////////OPCIONES///////////////////// --}}

              <div class="col-md-12 shadow-border margin-bottom">
                <div class="col-md-12 margin-bottom">
                  <h2 class="midsize" style="margin-top:0"><a id="opciones" href="#opciones">9. Opciones</a></h2>
                  <p>Es la ultima opcion de la barra de navegación. Al hacer click aquí se despliega un submenu que contiene 3 elementos:</p>
                  <ul>
                    <li><a href="#perfil">Mi perfil</a></li>
                    <li><a href="#configuracion">Configuracion</a></li>
                    <li><a href="#cerrarsesion">Cerrar sesión</a></li>
                  </ul> 
                </div>

                {{-- Mi perfil --}}
                <div class="col-md-12">
                  <h3 class="smallsize"><a id="perfil" href="#perfil">9.1 Mi perfil</a></h3> 

                  <div class="col-md-12 margin-bottom">
                    <div class="col-md-8">
                      <a href="http://arqtutorial:8080/img/guidelines-member/9.1perfil.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
                        <img src="/img/guidelines-member/9.1perfil.png" class="img-responsive img-rounded center-block" alt="Imagen del modulo de perfil de usuario" style="margin-top: 1.5%; max-height:500px;"></a>
                      </div>
                      <div class="col-md-4">
                       <p>En esta página se encuentra el perfil público del usuario. En la parte superior muestra datos básicos como el nombre, biografia y el puntaje en el tutorial. Por último se ve una barra de progreso del curso.</p>
                     </div>
                     </div>
                 </div>

                 {{-- Configuracion --}}
                <div class="col-md-12">
                  <h3 class="smallsize"><a id="configuracion" href="#configuracion">9.2 Configuración</a></h3> 
                  
                  <div class="col-md-12 margin-bottom">
                    <div class="col-md-8">
                      <a href="http://arqtutorial:8080/img/guidelines-member/9.2configuracion.png" target="_blank"><span class="sr-only">Abrir imagen en nueva pestaña</span>
                        <img src="/img/guidelines-member/9.2configuracion.png" class="img-responsive img-rounded center-block" alt="Imagen del modulo de configuracion" style="margin-top: 1.5%; max-height:500px;"></a>
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



  @if (Auth::user()->discapacidad == "daltonismo" || Auth::user()->discapacidad =="ceguera")
  <style type="text/css">
  p{color:white;}
  </style>
  @endif"


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
            {{-- ////////////////////////////////////////////////// --}}
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
          {{-- ////////////////////////////////////////////////// --}}
          <div class="col-md-12 shadow-border margin-bottom">
           <div class="col-md-12">
            <h2 class="midsize" style="margin-top:0"><a id="barranavegacion" href="#barranavegacion">2. Barra de navegación</a></h2>
            <p>La barra de navegación se encuentra en la parte superior de la ventana principal y facilita la exploración de diferentes componentes del tutorial.</p>
          </div>
          <div class="col-md-12 margin-bottom">
           <img src="/img/guidelines-admin/2barranavegacion.png" class="img-responsive img-rounded" alt="Imagen de la barra de navegación" style="margin-top: 3%; max-height:150px">
         </div>

         <div class="col-md-12 margin-bottom">
          <p>Cabe resaltar que los componentes de la barra de navegación son accesibles y cuenta con un link principal oculto que se dirige inmediatamente al contenido principal. Los otros componentes de la barra de navegación son los siguientes:</p>
          <ul>
            <li><a href="#paginaprincipal">Logo del tutorial o página principal</a></li>
            <li><a href="">Usuarios</a></li>
            <li><a href="">Cursos</a></li>
            <li><a href="">Lecciones</a></li>
            <li><a href="">Progreso</a></li>
            <li><a href="">Chat</a></li>
            <li><a href="">Ayuda</a></li>
            <li><a href="">Opciones</a></li>
          </ul> 
        </div>

      </div>
      {{-- ////////////////////////////////////////////////// --}}


      <div class="col-md-12 shadow-border margin-bottom">
        <div class="col-md-12">
        <h2 class="midsize" style="margin-top:0"><a id="paginaprincipal" href="#paginaprincipal">3. Página principal</a></h2>
          <p>Es la página de inicio cuando un usuario tipo administrador accede al tutorial. Tanto la imagen del logo del tutorial como el elemento llamado página principal de la barra de navegación se dirigen a esta página del panel de administración. Esta página cuenta con un pequeño mensaje de bienvenida. </p>
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



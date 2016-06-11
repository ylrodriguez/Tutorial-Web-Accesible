@extends('admin.template.main')

@section('title','Inicio')

@section('extraSpace')

<div class="row" hidden id="panelLecciones" style="margin: 0.05%">
  <div class="col-md-10 col-md-offset-1">
    <section class="section-admin">

     @if (Auth::user()->discapacidad == "daltonismo" || Auth::user()->discapacidad =="ceguera")
     <div class="panel panel-default" style="border-color: #2C3E50">
      <div class="panel-body"  style="background-color: #2C3E50;  ">
     @else
       <div class="panel panel-default" style="border-color: #375A7F">
        <div class="panel-body"  style="background-color: #375A7F;  ">
     @endif


         @include('flash::message') <!-- Para incluir en la plantilla flash -->
         @include('admin.template.partials.errors')  <!-- Agregar errores -->


         <div class="jumbotron myDiv" style="margin-bottom: 0px; border-radius:0;">
          <h1>Panel de admnistración</h1>
          <h2>¡Bienvenido al panel de administración!</h2>
          <p >Acá encontrarás todo tipo de información pertinente para una correcta administración del tutorial web. Las opciones son bastantes amplias; desde editar simplemente el nombre de un usuario hasta crear un nuevo curso desde cero con sus respectivas lecciones. Disfruta de tus privilegios como administrador y ayuda a la comunidad disfrutar de un tutorial de mayor calidad.</p>
          <hr style=" border-top: 1px solid white;">
          <p style="font-size: 1.2em">Autores del tutorial: Yojhan Rodriguez y Jeisson Sindicue</p>
        </div>

        <div class="row">
         <div class="col-md-12">
          <div class="panel panel-default" style="border-color: #f5f5f5">
            <div class="panel-body" style="background-color: #FFFFFF">

              {{-- Usuarios --}}
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="panel  panel-babyblue">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-3">
                        <i class="glyphicon glyphicon-user fa-5x"></i>
                      </div>
                      <div class="col-xs-9 text-right">
                        <div class="huge" id="countUsers"></div>
                        <div>Usuarios</div>
                      </div>
                    </div>
                  </div>
                  <a href="{{ route('admin.users.index') }}">
                    <div class="panel-footer">
                      <span class="pull-left">Ver detalles</span>
                      <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>
                      <div class="clearfix"></div>
                    </div>
                  </a>
                </div>
              </div>
              {{-- Cursos --}}
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="panel panel-green">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-3">
                        <i class="glyphicon glyphicon-book fa-5x"></i>
                      </div>
                      <div class="col-xs-9 text-right">
                        <div class="huge" id="countCursos"></div>
                        <div>Cursos</div>
                      </div>
                    </div>
                  </div>
                  <a href="{{ route('admin.cursos.index') }}">
                    <div class="panel-footer">
                      <span class="pull-left">Ver detalles</span>
                      <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>
                      <div class="clearfix"></div>
                    </div>
                  </a>
                </div>
              </div>
              {{-- Lecciones --}}
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="panel  panel-babyblue">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-3">
                        <i class="glyphicon glyphicon-th-list fa-5x"></i>
                      </div>
                      <div class="col-xs-9 text-right">
                        <div class="huge" id="countLecciones"></div>
                        <div>Lecciones</div>
                      </div>
                    </div>
                  </div>
                  <a href="http://arqtutorial:8080/admin/cursos/lecciones/3">
                    <div class="panel-footer">
                      <span class="pull-left">Ver detalles</span>
                      <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>
                      <div class="clearfix"></div>
                    </div>
                  </a>
                </div>
              </div>
              {{-- Comentarios --}}
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="panel  panel-green">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                      </div>
                      <div class="col-xs-9 text-right">
                        <div class="huge" id="countComentarios"></div>
                        <div>Comentarios</div>
                      </div>
                    </div>
                  </div>
                  <a href="http://arqtutorial:8080/admin/cursos/lecciones/3">
                    <div class="panel-footer">
                      <span class="pull-left">Ver detalles</span>
                      <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>
                      <div class="clearfix"></div>
                    </div>
                  </a>
                </div>
              </div>

              <div class="col-md-12"><hr style="margin-top: 0; border-top: 1px solid #d8d8d8;" /></div>

              <div class="col-md-12">

                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
                 
                  <div class="col-md-12">
                     <div id="container" style="width:100%; height:380px;"></div>
                  </div> {{-- 1 --}}
                  
                  <div class="col-md-12">
                    <hr style="margin-top: 0; border-top: 1px solid #375A7F;" />
                    <div id="container2" style="width:100%; height:380px;"></div>
                  </div>  {{-- 1 --}}


                  <div class="col-md-12">
                    <hr style="margin-top: 0; border-top: 1px solid #375A7F;" />
                    <div id="container3" style="width:100%; height:380px;"></div>
                  </div> {{-- 3 --}}

                  <div class="col-md-12">
                    <hr style="margin-top: 0; border-top: 1px solid #375A7F;"/>
                    <div id="container4" style="width:100%; height:380px; margin-bottom: 20px"></div>
                  </div>  {{-- 1 --}}

                </div>


                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                  <!-- BEGIN CBOX - www.cbox.ws - v4.3 -->
                  <h1 style="color:#375A7F" class="text-center">Chat <i class="fa fa-keyboard-o"></i></h1>
                  <section id="chat">

                    <div class="center-block" id="cboxdiv" style="position: relative; width: 200px; font-size: 0; line-height: 0;">
                      <div style="position: relative; height: 350px; overflow: auto; overflow-y: auto; -webkit-overflow-scrolling: touch; border:#ababab 1px solid;"><iframe src="http://www4.cbox.ws/box/?boxid=4300518&boxtag=15tnwq&sec=main" marginheight="0" marginwidth="0" frameborder="0" width="100%" height="100%" scrolling="auto" allowtransparency="yes" name="cboxmain4-4300518" id="cboxmain4-4300518"></iframe></div>
                      <div style="position: relative; height: 80px; overflow: hidden; border:#ababab 1px solid; border-top: 0px;"><iframe src="http://www4.cbox.ws/box/?boxid=4300518&boxtag=15tnwq&sec=form" marginheight="0" marginwidth="0" frameborder="0" width="100%" height="100%" scrolling="no" allowtransparency="yes" name="cboxform4-4300518" id="cboxform4-4300518"></iframe></div>
                    </div>
                    <!-- END CBOX -->
                  </section>   
                </div>

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

@section('js')

<script src="{{ asset('plugins/highcharts/highcharts.js') }}"></script>

<script type="text/javascript">
  $('#panelLecciones').fadeIn(600);
  $('.alert').delay(4000).slideUp(1000);
</script>

<script type="text/javascript">

  Highcharts.setOptions({
    global: {
      useUTC: false
    }
  });
  
  var dataEnviar = {
    'evento':'contar',
  };

  $.ajax({
    data:dataEnviar,
    url: '{{ route('admin.countComentarios') }}',
    type: 'get',
    success:  function (response) {
      $('#countComentarios').text(response);
    }
  });

        //Grafica de comentarios
        $.ajax({
          url: '{{ route('admin.countComentarios') }}',
          type: 'get',
          success:  function (response) {
           //response = jQuery.parseJSON(response);
           response = jQuery.parseJSON(response);
           console.log(response);
            //$('#countComentarios').text(response);
            chartComentarios(response);
          }
        });

        function chartComentarios(data){
          $('#container4').highcharts({
            chart: {
              type: 'areaspline'
            },
            title: {
              text: 'Comentarios'
            },
            legend: {
              layout: 'vertical',
              align: 'left',
              verticalAlign: 'top',
              x: 150,
              y: 100,
              floating: true,
              borderWidth: 1,
              backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            xAxis: {  

              type: 'datetime',
              dateTimeLabelFormats: {
                second: '%e. %b',
                minute: '%e. %b',
                hour: '%e. %B',
                day: '%e. %b',
                week: '%e. %b',
                month: '%e. %b',
                year: '%e. %b'
              }
            },
            yAxis: {
              title: {
                text: "Número de comentarios"
              }
            },

            plotOptions: {
              areaspline: {
                fillOpacity: 0.5
              }
            },
            tooltip:{
              shared: true,
              formatter: function(){
                return Highcharts.dateFormat("%B %e %Y", this.x) + ':  ' + 
                Highcharts.numberFormat(this.y, 1);
              }
            },
            series: [{
              color: '#00bc8c',
              name: "Número de comentarios por fecha",
              data: data,
              dashStyle: 'longdash'
            }]
          });
        }

        //Contar usuarios
        $.ajax({
          dataType: 'json',
          url: '{{ route('admin.countUsers') }}',
          type: 'get',
          success:  function (response) {
            $('#countUsers').text(response);
          }
        });

        //Calcular progreso
        $.ajax({
          dataType: 'json',
          url: '{{ route('admin.countCursos') }}',
          type: 'get',
          success:  function (response) {

           $('#countCursos').text(1);
           chartCurso(response);
         }
       });

        function chartCurso(data){
          $('#container3').highcharts({
            chart: {
              plotBackgroundColor: null,
              plotBorderWidth: 0,
              plotShadow: false
            },
            title: {
              text: '<strong>'+data[0][1].toFixed(2)+'%</strong><br><strong>Progreso</strong><br> de los usuarios',
              align: 'center',
              verticalAlign: 'middle',
              y: 40
            },
            tooltip: {
              pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
              pie: {
                dataLabels: {
                  enabled: true,
                  distance: -50,
                  style: {
                    fontWeight: 'bold',
                    color: 'black',
                  }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%']
              }
            },
            series: [{
              type: 'pie',
              name: 'Progreso',
              innerSize: '50%',
              data: data
            }]
          });
        }

        //Contar lecciones
        $.ajax({
          url: '{{ route('admin.countLecciones') }}',
          type: 'get',
          success:  function (response) {
            response = jQuery.parseJSON(response);

            $('#countLecciones').text(response.length);
            chartUserLesson(response);    
          }
        });

        function chartUserLesson(data){
          //console.log(data);
          $('#container').highcharts({

            chart: {
              type: "column"
            },
            title: {
              text: "Usuarios por lección"
            },
            xAxis: {
              type: 'category',
              allowDecimals: false,
              title: {
                text: "Lecciones"
              }
            },
            yAxis: {
              title: {
                text: "Usuarios"
              }
            },
            series: [{
              color: '#e74c3c',
              name: 'Arquitectura celulares',
              data: data
            }]
          }); 
        }

        //Chart Evaluaciones
        $.ajax({
          url: '{{ route('admin.cursos.evaluaciones.all') }}',
          type: 'get',
          success:  function (response) {
            response = jQuery.parseJSON(response);
            chartUserEvaluacion(response);  
          }
        });

        function chartUserEvaluacion(data){
          //console.log(data);
          $('#container2').highcharts({

            chart: {
              type: "bar"
            },
            title: {
              text: "Puntaje promedio por evaluación"
            },
            xAxis: {
              type: 'category',
              allowDecimals: false,
              title: {
                text: "Evaluaciones"
              }

            },
            yAxis: {
              title: {
                text: "Puntaje"
              }
            },
            series: [{
              color: 'orange',
              name: 'Arquitectura celulares',
              data: data
            }]
          }); 
        }

        
      </script> 

      @if (Auth::user()->discapacidad == "daltonismo" || Auth::user()->discapacidad =="ceguera")
      <style type="text/css">
        .panel-babyblue  > a  {
          color: #2c3e50;
        }
        .panel-green  > a  {
          color: #2c3e50;
        }

      </style>

      @endif


      @endsection

      <style type="text/css">
        .myDiv {
          position: relative;
          z-index: 1;
          padding: 4%;  
        }

        .myDiv:before {
          content: "";
          position: absolute;
          z-index: -1;
          top: 0;
          bottom: 0;
          left: 0;
          right: 0;
          background: url('../img/admin-index-background.jpg'); 
          opacity: 0.3;
        }
      </style>









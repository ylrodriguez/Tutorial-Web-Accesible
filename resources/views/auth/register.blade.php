<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicia sesión</title>
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap-flatly.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/chosen/chosen.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/font-awesome-4.5.0/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    

</head>
<body>
   <div class="container">
    <div class="row vertical-center">
        <div class="col-md-6 col-md-offset-3"  hidden id="panelRegister">
            <div class="panel panel-default" style="border-radius:1em;">
                <div class="panel-body" >

                    <div class="col-md-12" style="margin-bottom: 30px">

                        <div class="col-md-10">
                            <h1 class="size-titulo">Registrate</h1>
                            <p>¡Llena unos pocos datos y comienza a aprender!</p>
                        </div>

                        <div class="col-md-2">
                            <a href="http://arqtutorial:8080/">
                                <img id="img-imagen" src="/img/profiles/default.png" class="img-responsive img-rounded " alt="Volver a página de inicio" style="margin-top: 1em">
                            </a>
                        </div>

                        <div class="col-md-12 no-padding">
                          <hr/>
                      </div>

                  </div>


                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    {!! csrf_field() !!}

                    <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                        <label for="nombre" class="col-md-4 control-label">Nombre</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}">

                            @if ($errors->has('nombre'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">Correo electrónico</label>

                        <div class="col-md-7">
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username" class="col-md-4 control-label">Nombre de usuario</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}">

                            @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    {{-- Fecha nacimiento --}}
                    <div class ="form-group{{ $errors->has('fecha_nac_birthDay') ? ' has-error' : '' }}">
                    <span class="col-md-4 control-label"  style="font-size:15px; font-weight:bold">Fecha de nacimiento</span>
                        <div class="col-md-8">
                        <div id="fecha_nac"></div>
                         @if ($errors->has('fecha_nac_birthDay'))
                            <span class="help-block">
                                <strong>Por favor seleccione su fecha de nacimiento</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('pais') ? ' has-error' : '' }}">
                        <label for="pais" class="col-md-4 control-label">País</label>

                        <div class="col-md-7">
                            @include('admin.template.partials.countries')

                            @if ($errors->has('pais'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pais') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('discapacidad') ? ' has-error' : '' }}">
                        {!!Form::label('discapacidad', 'Discapacidad', array('class' => 'col-md-4 control-label'));!!}

                        <div class="col-md-7">
                         {!! Form::select('discapacidad', ['none' => 'Ninguna','ceguera' => 'Ceguera','daltonismo' => 'Daltonismo', 'bajaVision' => 'Baja visión' , 'sordera' => 'Sordera', 'otra' => 'Otra'], 'Ninguna',['class' => 'form-control', 'required']) !!}

                         @if ($errors->has('discapacidad'))
                         <span class="help-block">
                            <strong>{{ $errors->first('discapacidad') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>



                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Contraseña</label>

                    <div class="col-md-7">
                        <input type="password" class="form-control" id="password" name="password">

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password_confirmation" class="col-md-4 control-label">Confirmar contraseña</label>

                    <div class="col-md-7">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">

                        @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>




                <div class="form-group">
                    <div class="col-md-7 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-user"></i> Registrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</body>

<style type="text/css">
    .margin-rightleft{
        margin-left: 0px;
        margin-right: 0px;
    }

    .size-titulo{
        font-size: 3em;
    }

    .vertical-center {
      min-height: 90%;  /* Fallback for browsers do NOT support vh unit */
      min-height: 90vh; /* These two lines are counted as one :-)       */

      display: flex;
      align-items: center;
  }

  .quite{
    color: #000;
  }

    body {
        /* Margin bottom by footer height */
        background: url('../img/geometry2.gif'); 
        background-repeat:repeat;
    }

    .btn-link {
        font-weight: normal;
        color: white;
        border-radius: 0;
    }

    .btn-link:hover, .btn-link:focus {
        color: #18bc9c;
        text-decoration: underline;
        background-color: transparent;
    }
    .checkbox label{
        color: white;
    }

    .img-responsive {
        max-width: 82.5px; /* or to whatever you want here */
        max-height: auto; /* or to whatever you want here */
        vertical-align: middle;
    }

    .vcenter {
        display: inline-block;
        float: none;
    }

</style>

<script src="{{ asset('plugins/jquery/jquery-2.1.4.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('plugins/jquery/jquery-birthday-picker.js') }}"></script>

<script type="text/javascript">
    $("#panelRegister").slideDown(1000);
    $("#fecha_nac").birthdayPicker();
    $('legend').hide();


    $('#div1').removeClass('col-md-2');
    $('#div1').addClass('col-md-4');

    $('#div2').removeClass('col-md-3');
    $('#div2').addClass('col-md-4');

    $('#div3').removeClass('col-md-2');
    $('#div3').addClass('col-md-4');
</script>

</html>


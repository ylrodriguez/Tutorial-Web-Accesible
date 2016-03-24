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
            <div class="col-md-6 col-md-offset-3"  hidden id="panelLogin">
                <div class="panel panel-default" style="border-radius:1em;">
                    <div class="panel-body" >
                        <div class="col-md-12" style="margin-bottom: 30px">

                            <div class="col-md-10">
                                <h1 class="size-titulo">Inicio de sesión</h1>
                                <p>¡Ingresa tu correo y contraseña y continua aprendiendo!</p>
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





                      <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo electrónico</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} margin-rightleft">
                            <label for="contraseña" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="contraseña" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="panel-footer" style="border-radius:0.5em; background-color: #14609A">
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" style="color:white"> No cerrar sesión.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>

                            <div class="form-group" style="margin-bottom:0">
                                <div class="col-md-3 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in" style="padding-right: 5px"></i>Acceder
                                    </button>
                                </div>
                                <div class="col-md-5">
                                 <a class="btn btn-link" href="{{ url('/password/reset') }}">¿Olvidaste tu contraseña?</a>
                             </div>

                             <div class="col-md-3 col-md-offset-4">
                                 <a class="btn btn-link" href="{{ url('/register') }}" style="padding-left:0">¿Necesitas una cuenta? Crea una.</a>
                             </div>
                             

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
      min-height: 80%;  /* Fallback for browsers do NOT support vh unit */
      min-height: 80vh; /* These two lines are counted as one :-)       */

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

<script type="text/javascript">
    $("#panelLogin").slideDown(1000);
</script>

</html>


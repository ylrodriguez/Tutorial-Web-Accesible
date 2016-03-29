
@extends('admin.template.main')

@section('title','Lista de usuarios')


@section('content')

@include('flash::message') <!-- Para incluir en la plantilla flash -->
@include('admin.template.partials.errors')  <!-- Agregar errores -->

<div class="table-responsive">
	<table class="table table-striped table-condensed" 
 data-search="true"
 data-show-columns="true"
 data-toggle="table">

 @section('class-panel','col-md-12')
 @section('panel-title','Lista de usuarios')


 <thead>
  <th data-sortable="true">Id</th>
  <th data-sortable="true">-</th>
  <th data-sortable="true">Nombre</th>
  <th data-sortable="true">Correo</th>
  <th data-sortable="true">Nombre de usuario</th>
  <th data-sortable="true">Fecha nacimiento</th>
  <th data-sortable="true">Fecha registro</th>
  <th data-sortable="true">Discapacidad</th>
  <th data-sortable="true">País</th>
  <th data-align="center" data-sortable="true">Tipo</th>
  <th data-align="center">Opción</th>
</thead>
<tbody>
 @foreach($users as $user)
 <tr>
  <td>{{  $user->id }}</td>
  <td>
    @if($user->status == "activated")
    <span class="label label-success" title="Activo" alt="Activo"><i class="
      glyphicon glyphicon-ok"></i></span>
      @endif

      @if($user->status == "deactivated")
      <span class="label label-danger" title="No activo" alt="No activo"><i class="
        glyphicon glyphicon-remove"></i></span>
        @endif
      </td>
      <td>{{  $user->nombre }}</td>
      <td>{{  $user->email }}</td>
      <td>{{  $user->username }}</td>
      <td>{{  $user->fecha_nac }}</td>
      <td>{{  $user->dateCarbon }}</td>
      <td>{{  $user->discapacidad }}</td>
      <td>{{$user->pais}}<img style="display: block; margin-top: 5px" src ="/img/countries/{{ $user->codePais}}.png" alt=""></img> {{-- alt="Bandera de {{$user->pais}}" --}}
      </td>

      <td>
        @if($user->type == "admin")
        <span class="label label-danger" alt="administrador">Admin</span>
        @endif

        @if($user->type == "member")
        <span class="label label-primary" alt="miembro">Miembro</span>
        @endif
      </td>

      <td>
        @if ($user->type == "member")
        <a alt="Ver perfil" href="{{ route('admin.perfil.show', $user->slug) }}"  title="Abrir perfil" class="btn btn-info btn-xs"><span class="sr-only">Ver perfil</span><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>

        <a alt="Editar usuario" title="Editar" href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-xs"><span class="sr-only">Editar usuario</span>
          <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
          @endif

          @if ($user->type == "admin")
          <a alt="Ver perfil" href="{{ route('admin.perfil.show', $user->slug) }}" title="Abrir perfil" class="btn btn-info btn-xs" ><span class="sr-only">Ver perfil</span><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="row">
  <div class="col-md-8">
    {!! $users->render() !!}
  </div>

  <div class="col-md-4">
    <a href="{{ route('admin.users.create') }}" class="btn btn-success pull-right" style="margin: 20px 0;">Registrar nuevo usuario</a> 
  </div>
</div>


@endsection

@section('js')
<script type="text/javascript">
  $("#panelPretederminado").fadeIn(700);
  $('.alert').delay(4000).slideUp(1000);
</script>



@endsection

@extends('admin.template.main')
@section('title','Lista de Usuarios')
@section('content')
    <a href="{{ route('admin.users.create') }}" class="btn btn-info">Registrar nuevo usuario</a><hr />
    <table class="table table-striped">
        <thead>
          <th>ID</th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Rol(es)</th>
          <th>Estado</th>
          <th>Acción</th>
        </thead>
        <tbody>
          @foreach($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>
                @foreach($user->roles as $role)
                   <span class="label label-default">{{ $role->name }}</span>
                @endforeach
              </td>
              <td>
                @if($user->active == 0)
                    <span class="label label-danger">Inactivo</span>
                @else
                    <span class="label label-success">Activo</span>
                @endif
              </td>
              <td>
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
                <a href="{{ route('admin.users.destroy', $user->id) }}" onclick="return confirm('¿Seguro que desear eliminar el usuario {{ $user->name }}?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
<div class="text-center">{!! $users->render() !!}</div>
@endsection
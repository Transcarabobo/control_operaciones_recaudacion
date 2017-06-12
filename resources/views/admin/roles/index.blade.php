@extends('admin.template.main')
@section('title','Lista de Roles')
@section('content')
    <a href="{{ route('admin.roles.create') }}" class="btn btn-info">Registrar nuevo rol</a>
    <hr />
    <table class="table table-striped">
        <thead>
          <th>ID</th>
          <th>Nombre</th>
          <th>Slug</th>
          <th>Descripcion</th>
          <th>Acción</th>
        </thead>
        <tbody>
          @foreach($roles as $rol)
            <tr>
              <td>{{ $rol->id }}</td>
              <td>{{ $rol->name }}</td>
              <td>{{ $rol->slug }}</td>
              <td>{{ $rol->description }}</td>
              <td>
                <a href="{{ route('admin.roles.edit', $rol->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
                <a href="{{ route('admin.roles.destroy', $rol->id) }}" onclick="return confirm('¿Seguro que desear eliminar el operador {{ $rol->name }}?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
<div class="text-center">{!! $roles->render() !!}</div>
@endsection

@extends('admin.template.main')
@section('title','Lista de Permisos')
@section('content')
    <a href="{{ route('admin.permissions.create') }}" class="btn btn-info">Registrar nuevo permiso</a>
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
          @foreach($permissions as $permission)
            <tr>
              <td>{{ $permission->id }}</td>
              <td>{{ $permission->name }}</td>
              <td>{{ $permission->slug }}</td>
              <td>{{ $permission->description }}</td>
              <td>
                <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
                <a href="{{ route('admin.permissions.destroy', $permission->id) }}" onclick="return confirm('¿Seguro que desear eliminar el operador {{ $permission->name }}?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
<div class="text-center">{!! $permissions->render() !!}</div>
@endsection

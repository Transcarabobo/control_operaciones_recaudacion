@extends('admin.template.main')
@section('title','Lista de Rutas')
@section('content')
    <a href="{{ route('admin.routes.create') }}" class="btn btn-info">Registrar nueva Ruta</a><hr />
    <table class="table table-striped">
        <thead>
          <th>ID</th>
          <th>Nombre</th>
          <th>Pasaje</th>
          <th>Acción</th>
        </thead>
        <tbody>
          @foreach($routes as $route)
            <tr>
              <td>{{ $route->id }}</td>
              <td>{{ $route->name }}</td>
              <td>{{ $route->passage }}</td>
              <td>
                <a href="{{ route('admin.routes.edit', $route->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
                <a href="{{ route('admin.routes.destroy', $route->id) }}" onclick="return confirm('¿Seguro que desear eliminar el operador {{ $route->name }}?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
<div class="text-center">{!! $routes->render() !!}</div>
@endsection
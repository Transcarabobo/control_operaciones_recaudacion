@extends('admin.template.main')
@section('title','Listado de Recaudación' )
@section('content')
    <table class="table table-striped">
        <thead>
          <th>Operador</th>
          <th>Ruta</th>
          <th>Unidad</th>
          <th>Fecha</th>
          <th>Monto</th>
          <th>Acción</th>
        </thead>
        <tbody>
          @foreach($despatches as $despatch)
            <tr>
              <td>{{ $despatch->operator->name }}</td>
              <td>{{ $despatch->route->name }}</td>
              <td>{{ $despatch->unidad_id }}</td>
              <td>{{ $despatch->date }}</td>
              <td>
                <a href="{{ route('admin.despatches.edit', $despatch->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
                <a href="{{ route('admin.despatches.destroy', $despatch->id) }}" onclick="return confirm('¿Seguro que desear eliminar este despacho?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
    <div class="text-left">Total: {!! $despatches->total() !!} Despacho(s)</div>
    <div class="text-center">{!! $despatches->render() !!}</div>
@endsection

@extends('admin.template.main')
@section('title','Lista de Vehiculos')
@section('content')
    <a href="{{ route('admin.vehicles.create') }}" class="btn btn-info">Registrar nuevo vehiculo</a><hr />
    <table class="table table-striped">
        <thead>
          <th>ID</th>
          <th>Modelo</th>
          <th>Vin</th>
          <th>Linea</th>
          <th>Estado</th>
          <th>Acción</th>
        </thead>
        <tbody>
          @foreach($vehicles as $vehicle)
            <tr>
              <td>{{ $vehicle->id }}</td>
              <td>{{ $vehicle->model }}</td>
              <td>{{ $vehicle->vin }}</td>
              <td>{{ $vehicle->line_number }}</td>
              <td>
                @if($vehicle->status == "disabled")
                    <span class="label label-danger">Inoperativa</span>
                @else
                    <span class="label label-success">Operativa</span>
                @endif
              </td>
              <td>
                <a href="{{ route('admin.vehicles.edit', $vehicle->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
                <a href="{{ route('admin.vehicles.destroy', $vehicle->id) }}" onclick="return confirm('¿Seguro que desear eliminar el vehiculo {{ $vehicle->id }}?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
<div class="text-center">{!! $vehicles->render() !!}</div>
@endsection
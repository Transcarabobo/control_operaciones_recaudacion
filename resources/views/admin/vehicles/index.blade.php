@extends('admin.template.main')
@section('title','Lista de Vehiculos')
@section('content')
    <a href="{{ route('admin.vehicles.create') }}" class="btn btn-info">Registrar nuevo vehiculo</a>
    <!-- BUSCADOR DE ARTICULOS -->
      {!! Form::open(['route' => 'admin.vehicles.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
      <div class="input-group">
        {!! Form::text('id', null, ['class' => 'form-control', 'placeholder' => 'Buscar por ID...', 'aria-describedby' => 'search']) !!}
        <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
      </div>
      {!! Form::close() !!}
    <!-- FIN DEL BUSCADOR -->
    <hr />
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
                <div class="btn-group">
                @if($vehicle->status == "disabled")
                  <button type="button" class="btn btn-danger">Inoperativo</button>
                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @else
                  <button type="button" class="btn btn-success">Operativo</button>
                  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @endif
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.vehicles.status', $vehicle->id) }}">
                      @if($vehicle->status == "disabled")
                        Operativo
                      @else
                        Inoperativo
                      @endif
                    </a></li>
                  </ul>
                </div>
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

@extends('admin.template.main')
@section('title','Listado de Despachos' )
@section('content')
    <a href="{{ route('admin.despatches.create') }}" class="btn btn-info">Registrar nuevo Despacho</a>
    <!-- BUSCADOR DE DESPACHOS POR FECHA -->
      {!! Form::open(['route' => 'admin.despatches.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
        <div class="input-group">
          {!! Form::text('date', null, ['class' => 'form-control', 'placeholder' => 'Buscar por fecha...', 'aria-describedby' => 'search']) !!}
          <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
        </div>
      {!! Form::close() !!}
    <!-- FIN DEL BUSCADOR -->
    <hr />
    <table class="table table-striped">
        <thead>
          <th>Operador</th>
          <th>Ruta</th>
          <th>Unidad</th>
          <th>Fecha</th>
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
                @if(Auth::user()->admin())
                  <a href="{{ route('admin.despatches.destroy', $despatch->id) }}" onclick="return confirm('¿Seguro que desear eliminar este despacho?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
                @endif
                @if($despatch->collection == null)
                  <a href="{{ route('admin.collections.create', $despatch->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span></a>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
    <div class="text-left">Total: {!! $despatches->total() !!} Despacho(s)</div>
    <div class="text-center">{!! $despatches->render() !!}</div>
@endsection

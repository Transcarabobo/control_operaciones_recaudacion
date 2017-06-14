@extends('admin.template.main')
@section('title','Lista de Operadores')
@section('content')
    @can('create-operator')
    <a href="{{ route('admin.operators.create') }}" class="btn btn-info">Registrar nuevo operador</a>
    @endcan
    <!-- BUSCADOR DE OPERADORES POR NOMBRE-->
      {!! Form::open(['route' => 'admin.operators.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
      <div class="input-group">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar por Nombre... [Enter]', 'aria-describedby' => 'search']) !!}
        <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
      </div>
      {!! Form::close() !!}
    <!-- FIN DEL BUSCADOR -->
    <hr />
    <table class="table table-striped">
        <thead>
          <th>ID</th>
          <th>Nombre</th>
          <th>Cedula</th>
          <th>Serial de Tarjeta</th>
          <th>Acción</th>
        </thead>
        <tbody>
          @foreach($operators as $operator)
            <tr>
              <td>{{ $operator->id }}</td>
              <td>{{ $operator->name }}</td>
              <td>{{ $operator->cedula }}</td>
              <td>{{ $operator->id_card }}</td>
              <td>
                <a href="{{ route('admin.operators.edit', $operator->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
                @can('delete-operator')
                  <a href="{{ route('admin.operators.destroy', $operator->id) }}" onclick="return confirm('¿Seguro que desear eliminar el operador {{ $operator->name }}?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
                @endcan
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
<div class="text-center">{!! $operators->render() !!}</div>
@endsection

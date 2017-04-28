@extends('admin.template.main')
@section('title','Lista de Operadores')
@section('content')
    <a href="{{ route('admin.operators.create') }}" class="btn btn-info">Registrar nuevo operador</a><hr />
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
                <a href="{{ route('admin.operators.destroy', $operator->id) }}" onclick="return confirm('¿Seguro que desear eliminar el usuario {{ $operator->name }}?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
<div class="text-center">{!! $operators->render() !!}</div>
@endsection
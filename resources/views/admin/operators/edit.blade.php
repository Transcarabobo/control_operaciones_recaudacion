@extends('admin.template.main')

@section('title', 'Editar Operador'. $operator->name)

@section('content')
    <div class="col-xs-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
        {!! Form::open(['route' => ['admin.operators.update', $operator], 'method' => 'PUT']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', $operator->name, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('cedula', 'Cedula de Identidad') !!}
                {!! Form::text('cedula', $operator->cedula, ['class' => 'form-control', 'placeholder' => '12345678', 'required'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('id_card', 'ID Tarjeta') !!}
                {!! Form::text('id_card', $operator->id_card, ['class' => 'form-control', 'placeholder' => '1452FS40', 'required'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Editar', ['class' => 'btn btn-primary'])!!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection
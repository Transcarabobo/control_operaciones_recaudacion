@extends('admin.template.main')
@section('title','Crear Nuevo Despacho')
@section('content')
    <div class="col-xs-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
        {!! Form::open(['route' => 'admin.despatches.store', 'method' => 'POST']) !!}

            <div class="form-group">
                {!! Form::label('route_id', 'Ruta') !!}
                {!! Form::select('route_id', $routes, null,  ['class' => 'form-control', 'placeholder' => 'Nombre de la Ruta', 'required'])!!}

            </div>

            <div class="form-group">
                {!! Form::label('operator_id', 'Operador') !!}
                {!! Form::select('operator_id', $operators, null,  ['class' => 'form-control', 'placeholder' => 'Nombre del Operador', 'required'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('unidad_id', 'ID Unidad') !!}
                {!! Form::text('unidad_id', null, ['class' => 'form-control', 'placeholder' => 'ID de la Unidad'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('date', 'Fecha') !!}
                {!! Form::text('date', null, ['class' => 'form-control', 'placeholder' => 'Fecha del Parte'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('observations', 'Observaciones') !!}
                {!! Form::textarea('observations', null, ['class' => 'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::submit('Registrar', ['class' => 'btn btn-primary'])!!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection

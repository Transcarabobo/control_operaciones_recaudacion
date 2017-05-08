@extends('admin.template.main')
@section('title','Editar Despacho '. $despatch->id)
@section('content')
    <div class="col-xs-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
        {!! Form::open(['route' => ['admin.despatches.update', $despatch], 'method' => 'PUT']) !!}

            <div class="form-group">
                {!! Form::label('route_id', 'Ruta') !!}
                {!! Form::select('route_id', $routes, $despatch->route_id,  ['class' => 'form-control', 'required'])!!}

            </div>

            <div class="form-group">
                {!! Form::label('operator_id', 'Operador') !!}
                {!! Form::select('operator_id', $operators, $despatch->operator_id,  ['class' => 'form-control', 'required'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('unidad_id', 'ID Unidad') !!}
                {!! Form::text('unidad_id', $despatch->unidad_id, ['class' => 'form-control', 'placeholder' => 'ID de la Unidad'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('date', 'Fecha') !!}
                {!! Form::text('date', $despatch->date, ['class' => 'form-control', 'placeholder' => 'Fecha del Parte'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('observations', 'Observaciones') !!}
                {!! Form::textarea('observations', $despatch->observations, ['class' => 'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::submit('Editar', ['class' => 'btn btn-primary'])!!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection

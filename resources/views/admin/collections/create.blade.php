@extends('admin.template.main')
@section('title','Registrar Recaudacion de '.$despatch->operator->name.' | Ruta:'.$despatch->route_id.' | Vehiculo:'.$despatch->unidad_id.' | Fecha:'.$despatch->date)
@section('content')
    <div class="col-xs-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
        {!! Form::open(['route' => 'admin.despatches.store', 'method' => 'POST']) !!}

            {!! Form::hidden('despatch_id', $despatch->id) !!}

            <div class="form-group">
                {!! Form::label('amount', 'Monto') !!}
                {!! Form::text('amount', null, ['class' => 'form-control', 'placeholder' => 'Monto de la recaudacion'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Registrar', ['class' => 'btn btn-primary'])!!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection

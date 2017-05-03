@extends('admin.template.main')
@section('title','Crear Ruta')
@section('content')
    <div class="col-xs-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
        {!! Form::open(['route' => 'admin.routes.store', 'method' => 'POST']) !!}

            <div class="form-group">
                {!! Form::label('id', 'ID') !!}
                {!! Form::text('id', null, ['class' => 'form-control', 'placeholder' => 'ID de la Ruta', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null,  ['class' => 'form-control', 'placeholder' => 'Nombre de la Ruta', 'required'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('passage', 'Pasaje') !!}
                {!! Form::text('passage', null, ['class' => 'form-control', 'placeholder' => 'Costo del Pasaje'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Registrar', ['class' => 'btn btn-primary'])!!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection

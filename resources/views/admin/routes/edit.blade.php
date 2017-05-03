@extends('admin.template.main')

@section('title', 'Editar Ruta '. $route->id)

@section('content')
    <div class="col-xs-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
        {!! Form::open(['route' => ['admin.routes.update', $route], 'method' => 'PUT']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', $route->name, ['class' => 'form-control', 'placeholder' => 'Nombre de la Ruta', 'required'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('passage', 'Pasaje') !!}
                {!! Form::text('passage', $route->passage, ['class' => 'form-control', 'placeholder' => 'Costo del Pasaje', 'required'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Editar', ['class' => 'btn btn-primary'])!!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection
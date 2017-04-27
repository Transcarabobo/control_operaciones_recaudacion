@extends('admin.template.main')
@section('title','Crear Usuario')
@section('content')
    <div class="col-xs-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
        {!! Form::open(['route' => 'admin.users.store', 'method' => 'POST']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Correo Electronico') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@openmailbox.org', 'required'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Contraseña') !!}
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '**********', 'required'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('access', 'Acceso') !!}
                {!! Form::select('access', ['valores' => 'Valores', 'operaciones' => 'Operaciones', 'admin' => 'Administrador'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Registrar', ['class' => 'btn btn-primary'])!!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection

@extends('admin.template.main')
@section('title','Restablecer contraseña')
@section('content')
    <div class="col-xs-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
        {!! Form::open(['route' => 'user.password.reset', 'method' => 'POST']) !!}

            {!! Form::hidden('token', $token) !!}

            <div class="form-group">
                {!! Form::label('email', 'Correo Electronico') !!}
                {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'ejemplo@transcarabobo.com', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Nueva Contraseña') !!}
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '********', 'required'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('password_confirmation', 'Confirmar Nueva Contraseña') !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => '********', 'required'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Restablecer', ['class' => 'btn btn-primary'])!!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection
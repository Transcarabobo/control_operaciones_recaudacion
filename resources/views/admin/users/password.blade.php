@extends('admin.template.main')
@section('title','Cambiar contraseña')
@section('content')
    <div class="col-xs-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
        {!! Form::open(['route' => 'admin.users.password', 'method' => 'POST']) !!}

            <div class="form-group">
                {!! Form::label('mypassword', 'Contraseña Actual') !!}
                {!! Form::password('mypassword', ['class' => 'form-control', 'placeholder' => '********', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Nueva Contraseña') !!}
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '********', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password_confirmation', 'Confirmar Nueva Contraseña') !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => '********', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Modificar', ['class' => 'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection
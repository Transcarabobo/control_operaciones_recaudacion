@extends('admin.template.main')
@section('title','Login')
@section('content')
    <div class="col-xs-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
        {!! Form::open(['route' => 'admin.auth.login', 'method' => 'POST']) !!}

            <div class="form-group">
                {!! Form::label('email', 'Correo Electronico') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@transcarabobo.com', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Contraseña') !!}
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '********', 'required'])!!}
            </div>

            <div class="form-group">
                {!! Form::checkbox('remenber', null)!!} Recordarme
            </div>
            <div class="form-group">
                {!! Form::submit('Acceder', ['class' => 'btn btn-primary'])!!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection
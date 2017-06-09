@extends('admin.template.main')
@section('title','Olvido su contraseña')
@section('content')
    
    @if (Session::has('status'))
        <div class="alert alert-success">
            {{ Session::get('status') }}
        </div>
    @endif
    <div class="col-xs-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
        {!! Form::open(['route' => 'user.password.email', 'method' => 'POST']) !!}

            <div class="form-group">
                {!! Form::label('email', 'Correo Electronico') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@transcarabobo.com', 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Enviar Link', ['class' => 'btn btn-primary'])!!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection
@extends('admin.template.main')

@section('title', 'Editar usuario '. $user->name)

@section('content')
    <div class="col-xs-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
        {!! Form::open(['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Correo Electronico') !!}
                {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'example@openmailbox.org', 'required'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('access', 'Acceso') !!}
                {!! Form::select('access', ['valores' => 'Valores', 'operaciones' => 'Operaciones', 'admin' => 'Administrador'], $user->access, ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Editar', ['class' => 'btn btn-primary'])!!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection
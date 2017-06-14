@extends('admin.template.main')
@section('link')
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.min.css') }}">
@endsection
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
              {!! Form::label('roles', 'Rol(es)') !!}
              {!! Form::select('roles[]', $roles, $my_roles, ['class' => 'form-control select-role', 'multiple', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('active', 'Estado') !!}
                {!! Form::select('active', ['1' => 'Activo', '0' => 'Inactivo'], $user->active, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Editar', ['class' => 'btn btn-primary'])!!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection

@section('js')
    <script src="{{ asset('plugins/chosen/chosen.jquery.min.js') }}"></script>
    <script>
        $(".select-role").chosen({
            placeholder_text_multiple: "Seleccione Maximo 3 roles ",
            max_selected_options: 3,
            search_contains: true,
            no_results_text: "No se encontraron roles!"
        });
    </script>
@endsection
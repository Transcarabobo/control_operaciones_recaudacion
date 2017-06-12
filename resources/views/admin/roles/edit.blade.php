@extends('admin.template.main')
@section('link')
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.min.css') }}">
@endsection
@section('title','Editar Rol '.$rol->name)
@section('content')
    <div class="col-xs-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
        {!! Form::open(['route' => ['admin.roles.update', $rol], 'method' => 'PUT']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', $rol->name, ['class' => 'form-control', 'placeholder' => 'Nombre del Rol', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', $rol->slug, ['class' => 'form-control', 'placeholder' => 'slug-rol', 'required'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('permissions', 'Permisos') !!}
                {!! Form::select('permissions[]', $permissions, $my_permissions, ['class' => 'form-control select-permission', 'multiple', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Descripción') !!}
                {!! Form::text('description', $rol->description, ['class' => 'form-control', 'placeholder' => 'Descripción del Rol', 'required'])!!}
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
        $(".select-permission").chosen({
            placeholder_text_multiple: "Seleccione los permisos de este rol",
            search_contains: true,
            no_results_text: "No se encontraron permisos!"
        });
    </script>
@endsection

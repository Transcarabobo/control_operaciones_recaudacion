@extends('admin.template.main')
@section('title','Editar Permiso '.$permission->name)
@section('content')
    <div class="col-xs-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
        {!! Form::open(['route' => ['admin.permissions.update', $permission], 'method' => 'PUT']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', $permission->name, ['class' => 'form-control', 'placeholder' => 'Nombre del Permiso', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', $permission->slug, ['class' => 'form-control', 'placeholder' => 'slug-permiso', 'required'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Descripción') !!}
                {!! Form::text('description', $permission->description, ['class' => 'form-control', 'placeholder' => 'Descripción del Permiso', 'required'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Editar', ['class' => 'btn btn-primary'])!!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection

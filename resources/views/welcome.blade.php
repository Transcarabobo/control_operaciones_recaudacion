@extends('admin.template.main')
@section('link')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
@endsection
@section('title','Bienvenido ')
@section('content')
	<h1 class="text-center">Sistema de Control de Operaciones y Recaudación</h1 >
	<div class="col-md-6 col-md-offset-3 animated slideInLeft">
		<img src="{{ asset('img/fondo-bus.jpg') }}" class="img-responsive">
	</div>
@endsection
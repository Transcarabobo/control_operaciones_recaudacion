@extends('admin.template.main')

@section('title', 'Editar vehiculo '. $vehicle->id)

@section('content')
    <div class="col-xs-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
        {!! Form::open(['route' => ['admin.vehicles.update', $vehicle], 'method' => 'PUT']) !!}

            <div class="form-group">
                {!! Form::label('product_code', 'Codigo de Producto') !!}
                {!! Form::text('product_code', $vehicle->product_code, ['class' => 'form-control', 'placeholder' => '13H519M0131', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('motor_code', 'Codigo de Motor') !!}
                {!! Form::text('motor_code', $vehicle->motor_code, ['class' => 'form-control', 'placeholder' => 'J54YAE30057', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('type', 'Tipo de Combustible') !!}
                {!! Form::select('type', ['gas' => 'Gas', 'diesel' => 'Diesel'], $vehicle->type, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('brand', 'Marca') !!}
                {!! Form::select('brand', ['yutong' => 'Yutong'], $vehicle->brand, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('model', 'Modelo') !!}
                {!! Form::select('model', ['ZK6118HGA' => 'ZK6118HGA', 'ZK6896HGA' => 'ZK6896HGA'], $vehicle->model, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('year', 'Año') !!}
                {!! Form::number('year', $vehicle->year, ['class' => 'form-control', 'min' => '2010', 'max' => date('Y'), 'placeholder' => 'Año del Vehiculo', 'required'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('vin', 'Vin') !!}
                {!! Form::text('vin', $vehicle->vin, ['class' => 'form-control', 'placeholder' => 'LZYTAGE62E1001351', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('imei', 'Imei') !!}
                {!! Form::text('imei', $vehicle->imei, ['class' => 'form-control', 'placeholder' => '199999999999915']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('sincard', 'Serial del SinCard') !!}
                {!! Form::text('sincard', $vehicle->sincard, ['class' => 'form-control', 'placeholder' => '199999999999999918']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('line_number', 'Numero de Linea') !!}
                {!! Form::text('line_number', $vehicle->line_number, ['class' => 'form-control', 'placeholder' => '04161234567']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('status', 'Estado del Vehiculo') !!}
                {!! Form::select('status', ['enabled' => 'Operativa', 'disabled' => 'Inoperativa'], $vehicle->status, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Editar', ['class' => 'btn btn-primary'])!!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection
@extends('layouts.app')

@section('content')

<div class="container">


Formulario para editar un cliente

<form action="{{ url('/licenses/'.$license->id) }}" method="post">
    
    @csrf
    {{ method_field("PATCH") }}
    
    <h1>Editar licencia</h1>

    <label for="customer_id">Cedula del cliente</label>
    <label for="customer_id">{{ $customer->cedula }}</label>
    <input type="hidden" name="customer_id" value="{{ $license->customer_id }}">
    <br>

    <label for="license_type_id">Tipo de licencia</label>
    <select name="license_type_id" id="">
        <option selected value="{{ $license->license_type_id }}"></option>
        @foreach ($tipos_licencias as $tipo_licencia)
            <option value="{{ $tipo_licencia->id }}"> {{ $tipo_licencia->codigo }} </option>
        @endforeach 
    </select>
    <br>

    <label for="fecha_vencimiento">Fecha de vencimiento</label>
    <input type="date" value="{{ isset($license->fecha_vencimiento)?$license->fecha_vencimiento:"" }}" name="fecha_vencimiento">
    <br>

    <input type="submit" value="Enviar">
    
</form>

</div>

@endsection

@extends('layouts.app')

@section('content')

<div class="container">


Aca se mostrarán todas las licencias vencidas o que en menos de 45 días se venceran. <br>

<br>

<table class="table table-striped table-inverse table-responsive">

    <thead class="thead-inverse">
        <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Tipo de licencia</th>
            <th>Fecha de vencimiento</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    
        @foreach ($licenses as $license)
        <tr>
            <td>{{ $license->cedula }}</td>
            <td>{{ $license->nombre }}</td>
            <td>{{ $license->apellido }}</td>
            <td>{{ $license->license_type_id }}</td>
            <td>{{ $license->fecha_vencimiento }}</td>
            <td>
                <a href="{{ url('/callcenter/'.$license->cedula) }}">
                    Seguimiento
                </a> 
            </td>
        </tr>
        @endForeach

    </tbody>

</table>

</div>

@endsection

@extends('layouts.app')

@section('content')

<div class="container">


Aca se mostrarán todas las licencias <br>
<a href="{{ url("licenses/create") }}">Asignar licencia</a>
<br>
@if (Session::has("mensaje"))
    {{Session::get("mensaje")}}
@endif
<br>

<table class="table table-striped table-inverse table-responsive">

    <thead class="thead-inverse">
        <tr>
            <th>id</th>
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
            <td>{{ $license->id }}</td>
            <td>{{ $license->cedula }}</td>
            <td>{{ $license->nombre }}</td>
            <td>{{ $license->apellido }}</td>
            <td>{{ $license->license_type_id }}</td>
            <td>{{ $license->fecha_vencimiento }}</td>
            <td>
                <a href="{{ url('/licenses/'.$license->id.'/edit') }}">
                    Editar
                </a> 
                
                | 

                <form action="{{ url('/licenses/'.$license->id) }}" method="post">
                    @csrf
                    {{ method_field("DELETE") }}
                    <input type="submit" onclick="return confirm('¿Está seguro de borrar el registro?')" value="Borrar">
                </form>
            </td>
        </tr>
        @endForeach

    </tbody>

</table>

</div>

@endsection

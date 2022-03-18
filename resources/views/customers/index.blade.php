@extends('layouts.app')

@section('content')

<div class="container">

Aca se mostrarán todos los clientes <br>
<a href="{{ url("customers/create") }}">Registrar nuevo cliente</a> <br>
@if(Session::has("mensaje"))
    {{ Session::get("mensaje") }}
@endif

<table class="table table-striped table-inverse table-responsive">

    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>WhatsApp</th>
            <th>Telefono</th>
            <th>Dirección</th>
            <th>Email</th>
            <th>Oficina</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($customers as $customer)
        <tr>
            <td scope="row">{{ $customer->id }}</td>
            <td>{{ $customer->cedula }}</td>
            <td>{{ $customer->nombre }}</td>
            <td>{{ $customer->apellido }}</td>
            <td>{{ $customer->wp }}</td>
            <td>{{ $customer->telefono }}</td>
            <td>{{ $customer->direccion }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->office_id }}</td>
            <td>
                <a href="{{ url('/customers/'.$customer->id.'/edit') }}">
                    Editar
                </a> 
                
                | 

                <form action="{{ url('/customers/'.$customer->id) }}" method="post">
                    {{-- Con la siguiente linea enviamos un token por seguridad --}}
                    @csrf
                    {{-- Con la siguiente linea cambiamos el metodo a DELETE --}}
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


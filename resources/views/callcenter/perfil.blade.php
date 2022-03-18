@extends('layouts.app')

@section('content')

<div class="container">

Aca se mostrará la información del cliente y sus notas. <br>
<br>

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
               
            </td>
        </tr>
        @endForeach

    </tbody>

</table>

<br>

<div>
    <h1>Crear nota</h1>

    <form action="{{ url('/callcenter') }}" method="post">
        @csrf
        <input type="hidden" name="customer_id" value="{{ $customer->id }}">
        <input type="hidden" name="cedula" value="{{ $customer->cedula }}">
        <div class="form-group">
            
            <textarea class="form-control" name="nota" rows="3"></textarea>
        </div>
        <br>
        <input type="submit" value="Enviar">
    </form>
    


</div>
<br>
<div>
    <h1>Seguimiento</h1>
    @foreach ($dato as $nota )
        <label for="">{{  $nota->created_at }}:</label> 
        <label for="">{{  $nota->nota }}</label> <br> <br>
    @endforeach
        
</div>



    
</div>
@endsection


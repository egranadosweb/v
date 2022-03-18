@extends('layouts.app')

@section('content')

<div class="container">

Formulario para editar un cliente

<form action="{{ url('/customers/'.$customer->id) }}" method="post">
    @csrf
    {{ method_field("PATCH") }}
    @include('customers.form',["modo"=>"Editar"])
    
</form>

</div>

@endsection
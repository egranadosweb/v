@extends('layouts.app')

@section('content')

<div class="container">

<form action="{{ url('/customers') }}" method="post">
@csrf

    @include('customers.form',["modo"=>"Crear"])

</form>

</div>

@endsection
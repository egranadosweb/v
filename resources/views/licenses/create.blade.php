@extends('layouts.app')

@section('content')

<div class="container">

<form action="{{ url('/licenses') }}" method="post">
@csrf

    @include('licenses.form',["modo"=>"Crear"])

</form>

</div>

@endsection
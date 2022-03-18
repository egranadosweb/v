@extends('layouts.app')

@section('content')

<div class="container">

<form id="formulario" name="formulario" action="{{ url("/customers/") }}" method="get">
@csrf

    <div class="form-group">
        <label for="office_codigo">Cedula</label>
        <input id="cedula" type="text" class="form-control" value="" name="cedula">
    </div>

    <br>

    <input id="buscar" type="submit" value="Buscar">

</form>

</div>

@endsection

@push('scripts')

    <script>
        window.addEventListener("load", () => {
            
            console.log("Entró al window load");

            document.getElementById("buscar").addEventListener("click", function(e) {
                e.preventDefault();
                const inputCedula = document.getElementById("cedula").value;
                const ruta = inputCedula;

                const form = document.getElementById("formulario").action = ruta;
                document.getElementById('formulario').submit();
                //document.formulario.submit();
                //window.location.href = ruta;
                console.log(document.formulario);          

            });
        });
    </script>

@endpush
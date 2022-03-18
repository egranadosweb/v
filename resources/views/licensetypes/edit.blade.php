Formulario para editar un cliente

<form action="{{ url('/customers/'.$customer->id) }}" method="post">
    @csrf
    {{ method_field("PATCH") }}
    @include('customers.form')
    
</form>
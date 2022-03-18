

<form action="{{ url('/customers') }}" method="post">
@csrf

    @include('customers.form')

</form>
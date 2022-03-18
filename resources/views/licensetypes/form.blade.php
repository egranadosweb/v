    
    
    <label for="cedula">Cedula</label>
    <input type="text" value="{{ isset($customer->cedula)?$customer->cedula:"" }}" name="cedula">
    <br>

    <label for="nombre">Nombres</label>
    <input type="text" value="{{ isset($customer->nombre)?$customer->nombre:"" }}" name="nombre">
    <br>

    <label for="apellido">Apellidos</label>
    <input type="text" value="{{ isset($customer->apellido)?$customer->apellido:"" }}" name="apellido">
    <br>

    <label for="wp">Whatsapp</label>
    <input type="text" value="{{ isset($customer->wp)?$customer->wp:"" }}" name="wp">
    <br>

    <label for="telefono">Telefono</label>
    <input type="text" value="{{ isset($customer->telefono)?$customer->telefono:"" }}" name="telefono">
    <br>

    <label for="direccion">Direccion</label>
    <input type="text" value="{{ isset($customer->direccion)?$customer->direccion:"" }}" name="direccion">
    <br>

    <label for="email">Email</label>
    <input type="text" value="{{ isset($customer->email)?$customer->email:"" }}" name="email">
    <br>

    <label for="office_codigo">Oficina</label>
    <input type="text" value="{{ isset($customer->office_id)?$customer->office_id:"" }}" name="office_id">
    <br>

    <input type="submit" value="Enviar">
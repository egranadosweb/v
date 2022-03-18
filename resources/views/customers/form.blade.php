    
    <h1>{{$modo}} cliente</h1>
    
    <div class="form-group">
        <label for="cedula">Cedula</label>
        <input type="number" class="form-control" value="{{ isset($customer->cedula)?$customer->cedula:"" }}" name="cedula">
    </div>

    <div class="form-group">
        <label for="nombre">Nombres</label>
        <input type="text" class="form-control" value="{{ isset($customer->nombre)?$customer->nombre:"" }}" name="nombre">
    </div>

    <div class="form-group">
        <label for="apellido">Apellidos</label>
        <input type="text" class="form-control" value="{{ isset($customer->apellido)?$customer->apellido:"" }}" name="apellido">
    </div>

    <div class="form-group">
        <label for="wp">Whatsapp</label>
        <input type="number" class="form-control"  value="{{ isset($customer->wp)?$customer->wp:"" }}" name="wp">
    </div>

    <div class="form-group">
        <label for="telefono">Telefono</label>
        <input type="number" class="form-control"  value="{{ isset($customer->telefono)?$customer->telefono:"" }}" name="telefono">
    </div>

    <div class="form-group">
        <label for="direccion">Direccion</label>
        <input type="text" class="form-control" value="{{ isset($customer->direccion)?$customer->direccion:"" }}" name="direccion">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" value="{{ isset($customer->email)?$customer->email:"" }}" name="email">
    </div>

    <div class="form-group">
        <label for="office_codigo">Oficina</label>
        <input type="text" class="form-control" value="{{ isset($customer->office_id)?$customer->office_id:"" }}" name="office_id">
    </div>

    <input type="submit" value="{{$modo}}">
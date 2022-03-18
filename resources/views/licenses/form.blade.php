    
    <h1>{{ $modo }} licencia</h1>

    <div class="form-group">
        <label for="customer_id">Cedula del cliente</label>
        <input type="text" class="form-control" name="customer_id">
    </div>

    <div class="form-group">
        <label for="license_type_id">Tipo de licencia</label>
        <select name="license_type_id" class="form-control" id="">
            @foreach ($tipos_licencias as $tipo_licencia)
                <option value="{{ $tipo_licencia->id }}">{{ $tipo_licencia->codigo }}</option>
            @endforeach 
        </select>
    </div>

    <div class="form-group">
        <label for="fecha_vencimiento">Fecha de vencimiento</label>
        <input type="date" class="form-control" value="{{ isset($licencia->fecha_vencimiento)?$licencia->fecha_vencimiento:"" }}" name="fecha_vencimiento">
    </div>
    <br>

    <input type="submit" value="{{$modo}}">
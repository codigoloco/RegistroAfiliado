
@vite('resources/js/clientes/form.js')
<form action="{{ $action }}" method="{{$metodo}}">

    @csrf
    @if($modo != 'crear')
    @method('PUT')
    @endif

    <h1>{{ $title }}</h1>    
    <div class="row mb-3">
        <div class="col-3">
            <label for="primerNombre" class="form-label">Primer Nombre</label>
            <input type="text" class="form-control" value="{{ $cliente->primer_nombre }}" id="primerNombre" name="primerNombre" required>
        </div>
        <div class="col-3">
            <label for="segundoNombre" class="form-label">Segundo Nombre</label>
            <input type="text" class="form-control" value="{{ $cliente->segundo_nombre }}" id="segundoNombre" name="segundoNombre" >
        </div>
    </div>
    <div class="row mb-3">

        <div class="col-3">
            <label for="primerApellido" class="form-label">Primer Apellido</label>
            <input type="text" class="form-control" value="{{ $cliente->primer_apellido }}" id="primerApellido" name="primerApellido" required>
        </div>
        <div class="col-3">
            <label for="segundoApellido" class="form-label">Segundo Apellido</label>
            <input type="text" class="form-control" value="{{ $cliente->segundo_apellido }}" id="segundoApellido" name="segundoApellido" >
        </div>
    </div>

    </div>
    <div class="col-2">
        <label for="cedula" class="form-label">Cédula</label>
        <input type="text" 
        class="form-control cedula" 
        value="{{ old('cedula', $cliente->cedula ?? '') }}" 
        id="cedula" 
        name="cedula" 
        placeholder="99.999.999"
        required>
    </div>
    <div class="col-3">
        <label for="rif" class="form-label">RIF</label>
        <input type="text" class="form-control rif" value="{{ $cliente->rif }}" id="rif" name="rif" required>
    </div>
    <div class="row mb-3">
        <div class="col-3">
            <label for="nacionalidad" class="form-label">Nacionalidad</label>
            <select class="form-select"  name="Nacionalidad" id="Nacionalidad" required>
                <option value="v" {{ $cliente->nacionalidad == 'v' ? 'selected' : '' }}>Venezolano /a</option>
                <option value="E" {{ $cliente->nacionalidad == 'E' ? 'selected' : '' }}>Extranjero /a</option>
            </select>
        </div>

        <div class="row mb-3">
            <div class="col-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" value="{{ $cliente->telefono }}" id="Telefono" name="telefono" required>
            </div>
            <div class="col-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" value="{{ $cliente->correo }}" id="correo" name="correo" required>
            </div>
            <div class="col-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="activo" {{ $cliente->status == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ $cliente->status == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
        </div>        
        <div class="row mb-3">
            <div class="col-3">
                <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" value="{{ $cliente->fecha_nacimiento }}" id="fechaNacimiento" name="fechaNacimiento" min="2018-01-01" max="2018-12-31"  required>
            </div>
            <div class="col-3">
                <label for="empresa" class="form-label">Empresa</label>
                <input type="text" class="form-control " value="{{ $cliente->empresa }}" id="empresa" name="empresa" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" value="{{ $cliente->direccion }}" id="direccion" name="direccion" required>
            </div>
        </div>
    </div>
    <div class="col-3">
        <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
    </div>
</form>

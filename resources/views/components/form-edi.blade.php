<form action="{{ $action }}" method="POST">
    @csrf
    <h1>{{ $title }}</h1>
    <div class="row mb-3">
        <div class="col-3">
            <label for="primerNombre" class="form-label">Primer Nombre</label>
            <input type="text" class="form-control" value="{{ $cliente->primerNombre }}" id="primerNombre" name="primerNombre" required>
        </div>
        <div class="col-3">
            <label for="segundoNombre" class="form-label">Segundo Nombre</label>
            <input type="text" class="form-control" value="{{ $cliente->segundoNombre }}" id="segundoNombre" name="segundoNombre" required>
        </div>
    </div>
    <div class="row mb-3">

        <div class="col-3">
            <label for="primerApellido" class="form-label">Primer Apellido</label>
            <input type="text" class="form-control" value="{{ $cliente->primerApellido }}" id="primerApellido" name="primerApellido" required>
        </div>
        <div class="col-3">
            <label for="segundoApellido" class="form-label">Segundo Apellido</label>
            <input type="text" class="form-control" value="{{ $cliente->segundoApellido }}" id="segundoApellido" name="segundoApellido" required>
        </div>
    </div>

    </div>
    <div class="col-2">
        <label for="cedula" class="form-label">Cédula</label>
        <input type="text" class="form-control" value="{{ $cliente->cedula }}" id="cedula" name="cedula" required>
    </div>
    <div class="col-3">
        <label for="rif" class="form-label">RIF</label>
        <input type="text" class="form-control" value="{{ $cliente->rif }}" id="rif" name="rif" required>
    </div>
    <div class="row mb-3">
        <div class="col-3">
            <label for="nacionalidad" class="form-label">Nacionalidad</label>
            <select class="form-select" value="{{ $cliente->nacionalidad }}" name="Nacionalidad" id="Nacionalidad">
                <option value="v" selected>Venezolano /a</option>
                <option value="E">Extranjero /a</option>
            </select>
        </div>

        <div class="row mb-3">
            <div class="col-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="col-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="col-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
            </div>
            <div class="col-3">
                <label for="empresa" class="form-label">Empresa</label>
                <input type="text" class="form-control" id="empresa" name="empresa" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
        </div>
    </div>
    <div class="col-3">
        <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
    </div>
</form>
